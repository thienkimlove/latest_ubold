<?php

namespace App\Models;

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
        $order = static::select('*')->with('product');

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

            })
            ->addColumn('action', function ($order) {
                return '<a class="table-action-btn" title="Chỉnh sửa Order" href="' . route('orders.edit', $order->id) . '"><i class="fa fa-pencil text-success"></i></a>';
            })
            ->addColumn('product_name', function ($order) {
                return $order->product->title;
            })->editColumn('status', function ($order) {
                return config('system.customer_content_status.'.$order->status);
            })
            ->rawColumns(['action', 'status'])
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
