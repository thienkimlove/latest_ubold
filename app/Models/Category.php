<?php

namespace App\Models;

use App\Lib\Helpers;
use Cviebrock\EloquentSluggable\Sluggable;
use Cviebrock\EloquentSluggable\SluggableScopeHelpers;
use DataTables;

class Category extends \Eloquent
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

    public function getListPostsAttribute()
    {
        $categoryIds = [$this->id];

        if ($this->children()->count() > 0) {
            $categoryIds += $this->children()->pluck('id')->all();
        }

        return Post::whereIn('category_id', $categoryIds)
            ->where('status', true)
            ->orderBy('updated_at', 'desc')
            ->limit(6)
            ->get();
    }

    public function posts()
    {
        return $this->hasMany(Post::class);
    }


    public static function getDataTables($request)
    {
        $category = static::select('*')->with('parent');

        $modules = Module::where('content', 'categories')->get();


        return DataTables::of($category)
            ->filter(function ($query) use ($request) {
                if ($request->filled('name')) {
                    $query->where('name', 'like', '%' . $request->get('name') . '%');
                }

                if ($request->filled('status')) {
                    $query->where('status', $request->get('status'));
                }
            })
            ->addColumn('action', function ($category) use ($modules) {
                $response = '<a class="table-action-btn" title="Chỉnh sửa Category" href="' . route('categories.edit', $category->id) . '"><i class="fa fa-pencil text-success"></i></a>';

                $i = 0;

                foreach (Helpers::getModules('categories') as $key => $value) {
                    $i ++;
                    $inModule = false;

                    foreach ($modules as $module) {
                        if ($module->type == $key && $module->value == $category->id) {
                            $inModule = true;
                        }
                    }



                    if ($inModule) {
                        $response .= '<a class="table-action-btn" data-type="'.$key.'" data-content="categories" data-value="'.$category->id.'" data-url="' . route('modules.remove') . '" id="btn-module-'.$i.'-' . $category->id . '"  title="Off '.$value.'" href="javascript:;"><i class="fa fa-unlock text-danger"></i></a>';
                    } else {
                        $response .= '<a class="table-action-btn" data-type="'.$key.'" data-content="categories" data-value="'.$category->id.'" data-url="' . route('modules.add') . '" id="btn-module-'.$i.'-' . $category->id . '"  title="On '.$value.'" href="javascript:;"><i class="fa fa-lock text-success"></i></a>';
                    }
                }

                return $response;

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
