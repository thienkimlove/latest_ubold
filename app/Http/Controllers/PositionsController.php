<?php

namespace App\Http\Controllers;

use App\Http\Requests\PositionRequest;
use App\Models\Position;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;

class PositionsController extends Controller
{

    public function index()
    {
        return view('positions.index');
    }

    public function create()
    {
        return view('positions.create');
    }

    public function store(PositionRequest $request)
    {
        $request->store();

        flash()->success('Success!', 'Position successfully created.');

        return redirect()->route('positions.index');
    }

    public function edit($id)
    {
        $position = Position::find($id);

        if (! $position) {
            throw new ModelNotFoundException('Position not found.');
        }

        return view('positions.edit', compact('position'));
    }

    public function update(PositionRequest $request, $id)
    {
        $request->save($id);

        flash()->success('Thành công', 'Cập nhật thành công!');

        return redirect()->route('positions.index');
    }

    public function dataTables(Request $request)
    {
        return Position::getDatatables($request);
    }

}