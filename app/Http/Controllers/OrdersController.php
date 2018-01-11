<?php

namespace App\Http\Controllers;

use App\Http\Requests\OrderRequest;
use App\Models\Order;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;

class OrdersController extends Controller
{

    public function index()
    {
        return view('orders.index');
    }

    public function create()
    {
        return view('orders.create');
    }

    public function store(OrderRequest $request)
    {
        $request->store();

        flash()->success('Success!', 'Order successfully created.');

        return redirect()->route('orders.index');
    }

    public function edit($id)
    {
        $order = Order::find($id);

        if (! $order) {
            throw new ModelNotFoundException('Order not found.');
        }

        return view('orders.edit', compact('order'));
    }

    public function update(OrderRequest $request, $id)
    {
        $request->save($id);

        flash()->success('Thành công', 'Cập nhật thành công!');

        return redirect()->route('orders.index');
    }

    public function dataTables(Request $request)
    {
        return Order::getDatatables($request);
    }

    public function export(Request $request)
    {
        return Order::exportToExcel($request);
    }

    public function destroy($id) {
        Order::find($id)->delete();
        flash()->success('Success', 'Đơn hàng đã xóa thành công!');
        return response()->json(['status' => true]);
    }

}