<?php

namespace App\Http\Controllers;

use App\Http\Requests\ShareRequest;
use App\Models\Share;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;

class SharesController extends Controller
{

    public function index()
    {
        return view('shares.index');
    }

    public function create()
    {
        return view('shares.create');
    }

    public function store(ShareRequest $request)
    {
        $request->store();

        flash()->success('Success!', 'Share successfully created.');

        return redirect()->route('shares.index');
    }

    public function edit($id)
    {
        $share = Share::find($id);

        if (! $share) {
            throw new ModelNotFoundException('Share not found.');
        }

        return view('shares.edit', compact('share'));
    }

    public function update(ShareRequest $request, $id)
    {
        $request->save($id);

        flash()->success('Thành công', 'Cập nhật thành công!');

        return redirect()->route('shares.index');
    }

    public function dataTables(Request $request)
    {
        return Share::getDatatables($request);
    }

    public function destroy($id) {
        Share::find($id)->delete();
        flash()->success('Success', 'Share đã xóa thành công!');
        return response()->json(['status' => true]);
    }


}