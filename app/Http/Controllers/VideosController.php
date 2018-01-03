<?php

namespace App\Http\Controllers;

use App\Http\Requests\VideoRequest;
use App\Models\Video;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;

class VideosController extends Controller
{

    public function index()
    {
        return view('videos.index');
    }

    public function create()
    {
        return view('videos.create');
    }

    public function store(VideoRequest $request)
    {
        $request->store();

        flash()->success('Success!', 'Video successfully created.');

        return redirect()->route('videos.index');
    }

    public function edit($id)
    {
        $video = Video::find($id);

        if (! $video) {
            throw new ModelNotFoundException('Video not found.');
        }

        return view('videos.edit', compact('video'));
    }

    public function update(VideoRequest $request, $id)
    {
        $request->save($id);

        flash()->success('Thành công', 'Cập nhật thành công!');

        return redirect()->route('videos.index');
    }

    public function dataTables(Request $request)
    {
        return Video::getDatatables($request);
    }

}