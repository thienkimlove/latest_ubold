<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Cviebrock\EloquentSluggable\SluggableScopeHelpers;
use DataTables;

class Store extends \Eloquent
{

    use Sluggable;
    use SluggableScopeHelpers;

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

        $user = \Sentinel::getUser();

        return DataTables::of($store)
            ->filter(function ($query) use ($request) {
                if ($request->filled('name')) {
                    $query->where('name', 'like', '%' . $request->get('name') . '%');
                }

                if ($request->filled('district_id')) {
                    $query->where('district_id',  $request->get('district_id'));
                }

            })
            ->addColumn('action', function ($store) use ($user) {

                $response = null;

                if ($user->hasAccess(['stores.edit'])) {
                    $response .= '<a class="table-action-btn" title="Chỉnh sửa Địa chỉ phân phối" href="' . route('stores.edit', $store->id) . '"><i class="fa fa-pencil text-success"></i></a>';
                }


                if ($user->hasAccess(['stores.destroy'])) {
                    $response .= '<a class="table-action-btn" id="btn-delete-'.$store->id.'" title="Remove Địa chỉ phân phối" data-url="' . route('stores.destroy', $store->id) . '"><i class="fa fa-remove text-danger"></i></a>';
                }

                return $response;
            })
            ->addColumn('district_name', function ($store) {
                return $store->district->name;
            })
            ->rawColumns(['action'])
            ->make(true);
    }


}
