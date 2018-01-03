<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use DataTables;

class Category extends \Eloquent
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
        'desc',
        'seo_name',
        'seo_desc',
        'slug',
        'parent_id',
        'status'
    ];

    public function parent()
    {
        return $this->belongsTo(Category::class, 'parent_id', 'id');
    }

    /**
     * sub of this category
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function children()
    {
        return $this->hasMany(Category::class, 'parent_id', 'id');

    }


    public static function getDataTables($request)
    {
        $category = static::select('*')->with('parent');

        return DataTables::of($category)
            ->filter(function ($query) use ($request) {
                if ($request->filled('name')) {
                    $query->where('name', 'like', '%' . $request->get('name') . '%');
                }

                if ($request->filled('status')) {
                    $query->where('status', $request->get('status'));
                }
            })
            ->addColumn('action', function ($category) {
                return '<a class="table-action-btn" title="Chỉnh sửa category" href="' . route('categories.edit', $category->id) . '"><i class="fa fa-pencil text-success"></i></a>';
            })
            ->addColumn('parent_name', function ($category) {
                return $category->parent_id ? $category->parent->name : '';
            })
            ->editColumn('status', function ($category) {
                return $category->status ? '<i class="ion ion-checkmark-circled text-success"></i>' : '<i class="ion ion-close-circled text-danger"></i>';
            })
            ->rawColumns(['action', 'status'])
            ->make(true);
    }


}
