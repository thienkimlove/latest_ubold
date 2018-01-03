<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
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

}