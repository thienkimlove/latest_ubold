<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostRequest;
use App\Models\Post;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;

class PostsController extends Controller
{

    public function index()
    {
        return view('posts.index');
    }

    public function create()
    {
        return view('posts.create');
    }

    public function store(PostRequest $request)
    {
        $request->store();

        flash()->success('Success!', 'Post successfully created.');

        return redirect()->route('posts.index');
    }

    public function edit($id)
    {
        $post = Post::find($id);

        if (! $post) {
            throw new ModelNotFoundException('Post not found.');
        }

        return view('posts.edit', compact('post'));
    }

    public function update(PostRequest $request, $id)
    {
        $request->save($id);

        flash()->success('Thành công', 'Cập nhật thành công!');

        return redirect()->route('posts.index');
    }

    public function dataTables(Request $request)
    {
        return Post::getDatatables($request);
    }

}