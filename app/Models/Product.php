<?php

namespace App\Models;

use App\Lib\Helpers;
use Cviebrock\EloquentSluggable\Sluggable;
use Cviebrock\EloquentSluggable\SluggableScopeHelpers;
use DataTables;

class Product extends \Eloquent
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
        'slug',
        'seo_title',
        'seo_desc',
        'status',
        'image',
        'content',
        'content_tab1',
        'content_tab2',
        'content_tab3',
        'additions',
        'views',
        'user_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
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
            ->orderBy('updated_at', 'desc')
            ->limit($limit)
            ->get();

        $additionPosts = null;

        if ($relatedPosts->count() < $limit) {
            $categoryLimit = $limit - $relatedPosts->count();
            $additionPosts = Post::where('status', true)
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
        $product = static::select('*')->with('tags')->orderBy('created_at', 'desc');

        $modules = Module::where('content', 'products')->get();

        $user = \Sentinel::getUser();

        return DataTables::of($product)
            ->filter(function ($query) use ($request) {
                if ($request->filled('title')) {
                    $query->where('title', 'like', '%' . $request->get('title') . '%');
                }

                if ($request->filled('status')) {
                    $query->where('status', $request->get('status'));
                }
            })
            ->addColumn('action', function ($product) use ($modules, $user) {
                $response = null;

                if ($user->hasAccess(['products.edit'])) {
                    $response .= '<a class="table-action-btn" title="Chỉnh sửa sản phẩm" href="' . route('products.edit', $product->id) . '"><i class="fa fa-pencil text-success"></i></a>';
                }

                $response .= '<a class="table-action-btn" title="View sản phẩm" target="_blank" href="' . route('frontend.product',$product->slug) . '"><i class="fa fa-signing text-warning"></i></a>';

                if ($user->hasAccess(['products.destroy'])) {
                    $response .= '<a class="table-action-btn" id="btn-delete-'.$product->id.'" title="Remove sản phẩm" data-url="' . route('products.destroy', $product->id) . '"><i class="fa fa-remove text-danger"></i></a>';
                }

                $i = 0;

                foreach (Helpers::getModules('products') as $key => $value) {
                    $i ++;
                    $inModule = false;
                    foreach ($modules as $module) {
                        if ($module->type == $key && $module->value == $product->id) {
                            $inModule = true;
                        }
                    }

                    if ($inModule) {
                        $response .= '<a class="table-action-btn" data-type="'.$key.'" data-content="products" data-value="'.$product->id.'" data-url="' . route('modules.remove') . '" id="btn-module-'.$i.'-' . $product->id . '"  title="Off '.$value.'" href="javascript:;"><i class="fa fa-unlock text-danger"></i></a>';
                    } else {
                        $response .= '<a class="table-action-btn" data-type="'.$key.'" data-content="products" data-value="'.$product->id.'" data-url="' . route('modules.add') . '" id="btn-module-'.$i.'-' . $product->id . '"  title="On '.$value.'" href="javascript:;"><i class="fa fa-lock text-success"></i></a>';
                    }
                }

                return $response;

            })

            ->addColumn('user_name', function ($product) {
                return ($product->user) ? $product->user->name : 'Admin';
            })
            ->addColumn('histories', function ($product) {
                $histories = '';

                $logs = Event::where('content', 'products')
                    ->where('content_id', $product->id)
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
            ->editColumn('status', function ($product) use ($user) {

                $response = null;
                $response .= $product->status ? '<i class="ion ion-checkmark-circled text-success"></i>' : '<i class="ion ion-close-circled text-danger"></i>';

                if ($user->hasAccess(['products.approve'])) {
                    $response .= '<a class="table-action-btn" id="btn-adjust-'.$product->id.'" title="Duyệt sản phẩm" data-url="' . route('products.approve', $product->id) . '" href="javascript:;"><i class="fa fa-adjust text-success"></i></a>';
                }


                return $response;
            })

            ->addColumn('avatar', function ($product) {
                return $product->image ? '<img src="'.url('img/cache/small/'.$product->image).'" />' : '';
            })
            ->addColumn('tags', function ($product) {
                $tags = '';

                foreach ($product->tags as $tag) {
                    $tags .= '&nbsp;&nbsp;<span style="background-color: #e3e3e3">' . $tag->name . '</span>';
                }

                return $tags;
            })->editColumn('additions', function ($product) {

                $attr = '';

                if ($product->additions) {
                    $ars = json_decode($product->additions, true);
                    foreach ($ars as $key => $ar) {
                        $attr .= '&nbsp;&nbsp;'.$key.' <span style="background-color: #e3e3e3">' . $ar . '</span><br/>';
                    }
                }

                return $attr;
            })

            ->rawColumns(['action', 'status', 'avatar', 'tags', 'additions', 'histories'])
            ->make(true);
    }


}
