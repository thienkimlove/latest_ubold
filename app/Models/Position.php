<?php

namespace App\Models;

use DataTables;

class Position extends \Eloquent
{

    protected $fillable = [
        'name'
    ];


    public static function getDataTables($request)
    {
        $position = static::select('*');

        return DataTables::of($position)
            ->filter(function ($query) use ($request) {
                if ($request->filled('name')) {
                    $query->where('name', 'like', '%' . $request->get('name') . '%');
                }
            })
            ->addColumn('action', function ($position) {
                return '<a class="table-action-btn" title="Chỉnh sửa vị trí" href="' . route('positions.edit', $position->id) . '"><i class="fa fa-pencil text-success"></i></a>';
            })
            ->rawColumns(['action'])
            ->make(true);
    }


}
