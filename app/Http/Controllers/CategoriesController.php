<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{

    public function index()
    {
        return view('categories.index');
    }

    public function create()
    {
        return view('categories.create');
    }

    public function store(CategoryRequest $request)
    {
        $request->store();

        flash()->success('Success!', 'Category successfully created.');

        return redirect()->route('categories.index');
    }

    public function edit($id)
    {
        $category = Category::find($id);

        if (! $category) {
            throw new ModelNotFoundException('Category not found.');
        }

        return view('categories.edit', compact('category'));
    }

    public function update(CategoryRequest $request, $id)
    {
        $request->save($id);

        flash()->success('Thành công', 'Cập nhật thành công!');

        return redirect()->route('categories.index');
    }

    public function dataTables(Request $request)
    {
        return Category::getDatatables($request);
    }

    public function destroy($id) {
        Category::where('parent_id', $id)->update(['parent_id' => null]);
        Post::where('category_id', $id)->delete();
        Category::find($id)->delete();
        flash()->success('Success', 'Category đã xóa thành công!');
        return response()->json(['status' => true]);
    }

}