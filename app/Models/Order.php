<?php

namespace App\Models;

use Carbon\Carbon;
use DataTables;

class Order extends \Eloquent
{

    protected $fillable = [
        'name',
        'phone',
        'address',
        'product_id',
        'quantity',
        'note',
        'status',
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }


    public static function getDataTables($request)
    {
        $order = static::select('*')->with('product')->orderBy('created_at', 'desc');

        $user = \Sentinel::getUser();

        return DataTables::of($order)
            ->filter(function ($query) use ($request) {
                if ($request->filled('name')) {
                    $query->where('name', 'like', '%' . $request->get('name') . '%');
                }

                if ($request->filled('product_id')) {
                    $query->where('product_id',  $request->get('product_id'));
                }

                if ($request->filled('status')) {
                    $query->where('status',  $request->get('status'));
                }

                if ($request->filled('date')) {
                    $dateRange = explode(' - ', $request->get('date'));
                    $query->whereDate('created_at', '>=', Carbon::createFromFormat('d/m/Y', $dateRange[0])->toDateString());
                    $query->whereDate('created_at', '<=', Carbon::createFromFormat('d/m/Y', $dateRange[1])->toDateString());
                }

            })
            ->addColumn('action', function ($order) use ($user) {

                $response = null;

                if ($user->hasAccess(['orders.edit'])) {
                    $response .= '<a class="table-action-btn" title="Chỉnh sửa Đơn hàng" href="' . route('orders.edit', $order->id) . '"><i class="fa fa-pencil text-success"></i></a>';
                }

                if ($user->hasAccess(['orders.destroy'])) {
                    $response .= '<a class="table-action-btn" id="btn-delete-'.$order->id.'" title="Remove Đơn hàng" data-url="' . route('orders.destroy', $order->id) . '"><i class="fa fa-remove text-danger"></i></a>';
                }


                return $response;

            })
            ->addColumn('product_name', function ($order) {
                return $order->product->title;
            })->editColumn('status', function ($order) {
                return config('system.customer_content_status.'.$order->status);
            })
            ->addColumn('histories', function ($order) {
                $histories = '';

                $logs = Event::where('content', 'orders')
                    ->where('content_id', $order->id)
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
            ->rawColumns(['action', 'status', 'histories'])
            ->make(true);
    }


    public static function exportToExcel($request)
    {
        ini_set('memory_limit', '2048M');

        $query = Order::join('products', 'orders.product_id', '=', 'products.id');

        if ($request->filled('filter_name')) {
            $query->where('orders.name', $request->get('filter_name'));
        }

        if ($request->filled('filter_product_id')) {
            $query->where('products.id', $request->get('filter_product_id'));
        }

        if ($request->filled('filter_status')) {
            $query->where('orders.status', $request->get('filter_status'));
        }

        if ($request->filled('filter_date')) {
            $dateRange = explode(' - ', $request->get('filter_date'));
            $query->whereDate('orders.created_at', '>=', Carbon::createFromFormat('d/m/Y', $dateRange[0])->toDateString());
            $query->whereDate('orders.created_at', '<=', Carbon::createFromFormat('d/m/Y', $dateRange[1])->toDateString());
        }


        $reports = $query->selectRaw("orders.name as customer_name, orders.phone as phone, orders.address as address, orders.note as note, products.title as product_name, orders.quantity as quantity, orders.status as status, orders.created_at as date")->get();

        return (new static())->createExcelFile($reports);
    }

    public function createExcelFile($reports)
    {
        $objReader = \PHPExcel_IOFactory::createReader('Excel2007');
        $objPHPExcel = $objReader->load(resource_path('templates/orders.xlsx'));

        $row = 2;
        foreach ($reports as $report) {
            $objPHPExcel->getActiveSheet()->setCellValue('A'.$row, $row - 1)
                ->setCellValue('B'.$row, $report->customer_name)
                ->setCellValue('C'.$row, $report->address)
                ->setCellValue('D'.$row, $report->phone)
                ->setCellValue('E'.$row, $report->product_name)
                ->setCellValue('F'.$row, $report->quantity)
                ->setCellValue('G'.$row, config('system.customer_content_status.'.$report->status))
                ->setCellValue('H'.$row, $report->date);

            $row++;
        }


        $objWriter = \PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');

        $path = 'orders_'.date('Y_m_d_His').'.xlsx';

        $objWriter->save(storage_path('app/public/' . $path));

        return redirect('/storage/' . $path);
    }

}
