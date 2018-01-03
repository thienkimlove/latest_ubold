<?php

namespace App\Http\Controllers;

use App\Http\Requests\BannerRequest;
use App\Models\Banner;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;

class BannersController extends Controller
{

    public function index()
    {
        return view('banners.index');
    }

    public function create()
    {
        return view('banners.create');
    }

    public function store(BannerRequest $request)
    {
        $request->store();

        flash()->success('Success!', 'Banner successfully created.');

        return redirect()->route('banners.index');
    }

    public function edit($id)
    {
        $banner = Banner::find($id);

        if (! $banner) {
            throw new ModelNotFoundException('Banner not found.');
        }

        return view('banners.edit', compact('banner'));
    }

    public function update(BannerRequest $request, $id)
    {
        $request->save($id);

        flash()->success('Thành công', 'Cập nhật thành công!');

        return redirect()->route('banners.index');
    }

    public function dataTables(Request $request)
    {
        return Banner::getDatatables($request);
    }

}