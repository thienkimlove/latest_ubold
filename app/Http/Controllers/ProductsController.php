<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Models\Event;
use App\Models\Product;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;

class ProductsController extends Controller
{

    public function index()
    {
        return view('products.index');
    }

    public function create()
    {
        return view('products.create');
    }

    public function store(ProductRequest $request)
    {
        $request->store();

        flash()->success('Success!', 'Product successfully created.');

        return redirect()->route('products.index');
    }

    public function edit($id)
    {
        $product = Product::find($id);

        if (! $product) {
            throw new ModelNotFoundException('Product not found.');
        }

        return view('products.edit', compact('product'));
    }

    public function update(ProductRequest $request, $id)
    {
        $request->save($id);

        flash()->success('Thành công', 'Cập nhật thành công!');

        return redirect()->route('products.index');
    }

    public function dataTables(Request $request)
    {
        return Product::getDatatables($request);
    }


    public function approve($id)
    {
        $product = Product::find($id);

        $before = json_encode($product->toArray(), true);

        $product->status = !$product->status;

        $after = json_encode($product->toArray(), true);

        $product->save();

        Event::create([
            'content' => 'posts',
            'action' => 'edit',
            'user_id' => \Sentinel::getUser()->id,
            'before' => $before,
            'after' => $after,
            'content_id' => $product->id
        ]);

        return response()->json(['status' => true]);
    }

    public function destroy($id) {
        Product::find($id)->delete();
        flash()->success('Success', 'Sản phẩm đã xóa thành công!');
        return response()->json(['status' => true]);
    }

}