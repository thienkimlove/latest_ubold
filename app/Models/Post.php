<?php

namespace App\Models;

use App\Lib\Helpers;
use Cviebrock\EloquentSluggable\Sluggable;
use DataTables;

class Post extends \Eloquent
{

    use Sluggable;

    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'title',
                'onUpdate' => true,
            ]
        ];
    }

    protected $fillable = [
        'title',
        'desc',
        'seo_title',
        'seo_desc',
        'slug',
        'category_id',
        'status',
        'image',
        'content',
        'views'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }


    public static function getDataTables($request)
    {
        $post = static::select('*')->with('category');

        $modules = Module::where('content', 'posts')->pluck('value', 'type')->all();

        return DataTables::of($post)
            ->filter(function ($query) use ($request) {
                if ($request->filled('title')) {
                    $query->where('title', 'like', '%' . $request->get('title') . '%');
                }

                if ($request->filled('category_id')) {
                    $query->where('category_id', $request->get('category_id'));
                }

                if ($request->filled('status')) {
                    $query->where('status', $request->get('status'));
                }
            })
            ->addColumn('action', function ($post) use ($modules) {
                $response = '<a class="table-action-btn" title="Chỉnh sửa post" href="' . route('posts.edit', $post->id) . '"><i class="fa fa-pencil text-success"></i></a>';

                $i = 0;

                foreach (Helpers::getModules('posts') as $key => $value) {
                    $i ++;
                    if (isset($modules[$key]) && $modules[$key] == $post->id) {
                        $response .= '<a class="table-action-btn" data-type="'.$key.'" data-content="posts" data-value="'.$post->id.'" data-url="' . route('modules.remove') . '" id="btn-module-'.$i.'-' . $post->id . '"  title="Off '.$value.'" href="javascript:;"><i class="fa fa-unlock text-danger"></i></a>';
                    } else {
                        $response .= '<a class="table-action-btn" data-type="'.$key.'" data-content="posts" data-value="'.$post->id.'" data-url="' . route('modules.add') . '" id="btn-module-'.$i.'-' . $post->id . '"  title="On '.$value.'" href="javascript:;"><i class="fa fa-lock text-success"></i></a>';
                    }
                }

                return $response;

            })
            ->addColumn('category_name', function ($post) {
                return $post->category ? $post->category->name : '';
            })
            ->addColumn('avatar', function ($post) {
                return $post->image ? '<img src="'.url('img/cache/small/'.$post->image).'" />' : '';
            })
            ->addColumn('tags', function ($user) {
                $tags = '';

                foreach ($user->tags as $tag) {
                    $tags .= '&nbsp;&nbsp;<span style="background-color: #e3e3e3">' . $tag->name . '</span>';
                }

                return $tags;
            })
            ->editColumn('status', function ($post) {
                return $post->status ? '<i class="ion ion-checkmark-circled text-success"></i>' : '<i class="ion ion-close-circled text-danger"></i>';
            })
            ->rawColumns(['action', 'status', 'avatar', 'tags'])
            ->make(true);
    }


}
