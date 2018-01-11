<?php

namespace App\Models;

use App\Lib\Helpers;
use Cviebrock\EloquentSluggable\Sluggable;
use Cviebrock\EloquentSluggable\SluggableScopeHelpers;
use DataTables;

class Post extends \Eloquent
{

    use Sluggable;
    use SluggableScopeHelpers;

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
        'views',
        'user_id'
    ];

    public function user()
    {
       return $this->belongsTo(User::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }

    public function getTagListAttribute()
    {
        return $this->tags()->pluck('name')->all();
    }

    public function scopePublish($query)
    {
        $query->where('status', true);
    }

    public function getRelatedPostsAttribute()
    {
        $limit = 5;

        $post_tag = $this->tags()->pluck('id')->all();

        $relatedPosts = Post::where('status', true)
            ->whereHas('tags', function($q) use ($post_tag){
                $q->whereIn('id', $post_tag);
            })
            ->where('id', '!=', $this->id)
            ->orderBy('updated_at', 'desc')
            ->limit($limit)
            ->get();

        $additionPosts = null;

        if ($relatedPosts->count() < $limit) {
            $categoryLimit = $limit - $relatedPosts->count();
            $additionPosts = Post::where('status', true)
                ->where('category_id', $this->category_id)
                ->where('id', '!=', $this->id)
                ->orderBy('updated_at', 'desc')
                ->limit($categoryLimit)
                ->get();
        }
        if ($additionPosts) {
            foreach ($additionPosts as $post) {
                if (!in_array($post->id, $relatedPosts->pluck('id')->all())) {
                    $relatedPosts->push($post);
                }
            }
        }

        return $relatedPosts;
    }


    public static function getDataTables($request)
    {
        $post = static::select('*')->with('category')->orderBy('created_at', 'desc');

        $modules = Module::where('content', 'products')->get();

        $user = \Sentinel::getUser();

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
            ->addColumn('action', function ($post) use ($modules, $user) {

                $response = null;

                if ($user->hasAccess(['posts.edit'])) {
                    $response .= '<a class="table-action-btn" title="Chỉnh sửa post" href="' . route('posts.edit', $post->id) . '"><i class="fa fa-pencil text-success"></i></a>';
                }

                $response .= '<a class="table-action-btn" title="View post" target="_blank" href="' . url($post->slug.'.html') . '"><i class="fa fa-signing text-warning"></i></a>';

                if ($user->hasAccess(['posts.destroy'])) {
                    $response .= '<a class="table-action-btn" id="btn-delete-'.$post->id.'" title="Remove post" data-url="' . route('posts.destroy', $post->id) . '"><i class="fa fa-remove text-danger"></i></a>';
                }

                $i = 0;

                foreach (Helpers::getModules('posts') as $key => $value) {
                    $i ++;


                    $inModule = false;

                    foreach ($modules as $module) {
                        if ($module->type == $key && $module->value == $post->id) {
                            $inModule = true;
                        }
                    }

                    if ($inModule) {
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
            ->addColumn('tags', function ($post) {
                $tags = '';

                foreach ($post->tags as $tag) {
                    $tags .= '&nbsp;&nbsp;<span style="background-color: #e3e3e3">' . $tag->name . '</span>';
                }

                return $tags;
            })
            ->addColumn('user_name', function ($post) {
               return ($post->user) ? $post->user->name : 'Admin';
            })
            ->addColumn('histories', function ($post) {
                $histories = '';

                $logs = Event::where('content', 'posts')
                    ->where('content_id', $post->id)
                    ->latest('created_at')
                    ->limit(3)
                    ->get();

                if ($logs->count() > 0) {
                    foreach ($logs as $log) {
                        $action = ($log->action == 'edit') ? 'Sửa' : 'Tạo';
                        $histories .= '<b>'.$log->user->name.'</b> '.$action.'&nbsp;&nbsp;<span style="background-color: #e3e3e3">' . $log->created_at->toDayDateTimeString() . '</span><br/>';
                    }
                }

                return $histories;
            })
            ->editColumn('status', function ($post) use ($user) {

                $response = null;


                $response .= $post->status ? '<i class="ion ion-checkmark-circled text-success"></i>' : '<i class="ion ion-close-circled text-danger"></i>';

                if ($user->hasAccess(['posts.approve'])) {
                    $response .= '<a class="table-action-btn" id="btn-adjust-'.$post->id.'" title="Duyệt bài viết" data-url="' . route('posts.approve', $post->id) . '" href="javascript:;"><i class="fa fa-adjust text-success"></i></a>';
                }


                return $response;
            })
            ->rawColumns(['action', 'status', 'avatar', 'tags', 'histories', 'user_name'])
            ->make(true);
    }


}
