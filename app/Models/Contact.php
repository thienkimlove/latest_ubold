<?php

namespace App\Models;

use Carbon\Carbon;
use DataTables;

class Contact extends \Eloquent
{

    protected $fillable = [
        'title',
        'name',
        'phone',
        'email',
        'content',
        'status',
    ];

    public static function getDataTables($request)
    {
        $contact = static::select('*')->orderBy('created_at', 'desc');

        $user = \Sentinel::getUser();

        return DataTables::of($contact)
            ->filter(function ($query) use ($request) {
                if ($request->filled('name')) {
                    $query->where('name', 'like', '%' . $request->get('name') . '%');
                }

                if ($request->filled('status')) {
                    $query->where('status', $request->get('status'));
                }

                if ($request->filled('date')) {
                    $dateRange = explode(' - ', $request->get('date'));
                    $query->whereDate('created_at', '>=', Carbon::createFromFormat('d/m/Y', $dateRange[0])->toDateString());
                    $query->whereDate('created_at', '<=', Carbon::createFromFormat('d/m/Y', $dateRange[1])->toDateString());
                }

            })
            ->addColumn('action', function ($contact) use ($user) {

                $response = null;

                if ($user->hasAccess(['contacts.edit'])) {
                    $response .= '<a class="table-action-btn" title="Chỉnh sửa Contact" href="' . route('contacts.edit', $contact->id) . '"><i class="fa fa-pencil text-success"></i></a>';
                }

                if ($user->hasAccess(['contacts.destroy'])) {
                    $response .= '<a class="table-action-btn" id="btn-delete-'.$contact->id.'" title="Remove Contact" data-url="' . route('contacts.destroy', $contact->id) . '"><i class="fa fa-remove text-danger"></i></a>';
                }


                return $response;

            })
            ->addColumn('histories', function ($contact) {
                $histories = '';

                $logs = Event::where('content', 'contacts')
                    ->where('content_id', $contact->id)
                    ->latest('created_at')
                    ->limit(3)
                    ->get();

                if ($logs->count() > 0) {
                    foreach ($logs as $log) {
                        $action = ($log->action == 'edit') ? 'Sửa' : 'Tạo';
                        $histories .= '<b>'.$log->user->name.'</b> '.$action.'&nbsp;&nbsp;<span style="background-color: #e3e3e3">' . $log->created_at->toDayDateTimeString() . '</span><br/>';
                    }
                }

                return $histories;
            })
           ->editColumn('status', function ($contact) {
                return config('system.customer_content_status.'.$contact->status);
            })
            ->rawColumns(['action', 'status', 'histories'])
            ->make(true);
    }

    public static function exportToExcel($request)
    {
        ini_set('memory_limit', '2048M');

        $query = Contact::latest('created_at', 'desc');

        if ($request->filled('filter_name')) {
            $query->where('name', $request->get('filter_name'));
        }


        if ($request->filled('filter_status')) {
            $query->where('status', $request->get('filter_status'));
        }

        if ($request->filled('filter_date')) {
            $dateRange = explode(' - ', $request->get('filter_date'));
            $query->whereDate('created_at', '>=', Carbon::createFromFormat('d/m/Y', $dateRange[0])->toDateString());
            $query->whereDate('created_at', '<=', Carbon::createFromFormat('d/m/Y', $dateRange[1])->toDateString());
        }


        $reports = $query->get();

        return (new static())->createExcelFile($reports);
    }

    public function createExcelFile($reports)
    {
        $objReader = \PHPExcel_IOFactory::createReader('Excel2007');
        $objPHPExcel = $objReader->load(resource_path('templates/contacts.xlsx'));

        $row = 2;
        foreach ($reports as $report) {
            $objPHPExcel->getActiveSheet()->setCellValue('A'.$row, $row - 1)
                ->setCellValue('B'.$row, $report->title)
                ->setCellValue('C'.$row, $report->name)
                ->setCellValue('D'.$row, $report->phone)
                ->setCellValue('E'.$row, $report->email)
                ->setCellValue('F'.$row, $report->content)
                ->setCellValue('G'.$row, config('system.customer_content_status.'.$report->status))
                ->setCellValue('H'.$row, $report->created_at);

            $row++;
        }


        $objWriter = \PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');

        $path = 'contacts_'.date('Y_m_d_His').'.xlsx';

        $objWriter->save(storage_path('app/public/' . $path));

        return redirect('/storage/' . $path);
    }


}
