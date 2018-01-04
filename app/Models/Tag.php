<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Cviebrock\EloquentSluggable\SluggableScopeHelpers;
use DataTables;

class Tag extends \Eloquent
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
        'seo_name',
        'seo_desc',
        'slug',
    ];

    public function posts()
    {
        return $this->belongsToMany(Post::class);
    }

    public static function getDataTables($request)
    {
        $tag = static::select('*');

        return DataTables::of($tag)
            ->filter(function ($query) use ($request) {
                if ($request->filled('name')) {
                    $query->where('name', 'like', '%' . $request->get('name') . '%');
                }
            })
            ->addColumn('action', function ($tag) {
                return '<a class="table-action-btn" title="Chỉnh sửa Tag" href="' . route('tags.edit', $tag->id) . '"><i class="fa fa-pencil text-success"></i></a>';
            })
            ->rawColumns(['action'])
            ->make(true);
    }


}
