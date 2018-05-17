<?php

namespace App\Http\Controllers;

use App\Http\Requests\CommentRequest;
use App\Models\Comment;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;

class CommentsController extends Controller
{

    public function index()
    {
        return view('comments.index');
    }

    public function create()
    {
        return view('comments.create');
    }

    public function store(CommentRequest $request)
    {
        $request->store();

        flash()->success('Success!', 'Comment successfully created.');

        return redirect()->route('comments.index');
    }

    public function edit($id)
    {
        $comment = Comment::find($id);

        if (! $comment) {
            throw new ModelNotFoundException('Comment not found.');
        }

        return view('comments.edit', compact('comment'));
    }

    public function update(CommentRequest $request, $id)
    {
        $request->save($id);

        flash()->success('Thành công', 'Cập nhật thành công!');

        return redirect()->route('comments.index');
    }

    public function dataTables(Request $request)
    {
        return Comment::getDatatables($request);
    }

    public function destroy($id) {
        Comment::find($id)->delete();
        flash()->success('Success', 'Bình luận đã xóa thành công!');
        return response()->json(['status' => true]);
    }


}