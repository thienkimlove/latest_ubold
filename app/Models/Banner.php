<?php

namespace App\Models;

use DataTables;

class Banner extends \Eloquent
{

    protected $fillable = [
        'link',
        'image',
        'position_id',
        'status'
    ];

    public function position()
    {
        return $this->belongsTo(Position::class);
    }


    public static function getDataTables($request)
    {
        $banner = static::select('*')->with('position');

        return DataTables::of($banner)
            ->filter(function ($query) use ($request) {
                if ($request->filled('position_id')) {
                    $query->where('position_id', $request->get('position_id'));
                }
            })
            ->addColumn('avatar', function ($banner) {
                return $banner->image ? '<img src="'.url('img/cache/small/'.$banner->image).'" />' : '';
            })
            ->addColumn('action', function ($banner) {
                return '<a class="table-action-btn" title="Chỉnh sửa banner" href="' . route('banners.edit', $banner->id) . '"><i class="fa fa-pencil text-success"></i></a>';
            })
            ->addColumn('position_name', function ($banner) {
                return $banner->position->name;
            })
            ->editColumn('status', function ($banner) {
                return $banner->status ? '<i class="ion ion-checkmark-circled text-success"></i>' : '<i class="ion ion-close-circled text-danger"></i>';
            })
            ->rawColumns(['action', 'avatar', 'status'])
            ->make(true);
    }


}
