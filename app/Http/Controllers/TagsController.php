<?php

namespace App\Http\Controllers;

use App\Http\Requests\TagRequest;
use App\Models\Tag;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;

class TagsController extends Controller
{

    public function index()
    {
        return view('tags.index');
    }

    public function edit($id)
    {
        $tag = Tag::find($id);

        if (! $tag) {
            throw new ModelNotFoundException('Tag not found.');
        }

        return view('tags.edit', compact('tag'));
    }

    public function update(TagRequest $request, $id)
    {
        $request->save($id);

        flash()->success('Thành công', 'Cập nhật thành công!');

        return redirect()->route('tags.index');
    }


    public function dataTables(Request $request)
    {
        return Tag::getDatatables($request);
    }

}