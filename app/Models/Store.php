<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use DataTables;

class Store extends \Eloquent
{

    use Sluggable;

    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'name',
                'onUpdate' => true,
            ]
        ];
    }

    protected $fillable = [
        'name',
        'slug',
        'address',
        'phone',
        'district_id'
    ];

    public function district()
    {
        return $this->belongsTo(District::class);
    }


    public static function getDataTables($request)
    {
        $store = static::select('*')->with('district');

        return DataTables::of($store)
            ->filter(function ($query) use ($request) {
                if ($request->filled('name')) {
                    $query->where('name', 'like', '%' . $request->get('name') . '%');
                }

                if ($request->filled('district_id')) {
                    $query->where('district_id',  $request->get('district_id'));
                }

            })
            ->addColumn('action', function ($store) {
                return '<a class="table-action-btn" title="Chỉnh sửa store" href="' . route('stores.edit', $store->id) . '"><i class="fa fa-pencil text-success"></i></a>';
            })
            ->addColumn('district_name', function ($store) {
                return $store->district->name;
            })
            ->rawColumns(['action'])
            ->make(true);
    }


}
