<?php

namespace App\Models;

use App\Lib\Helpers;
use Cviebrock\EloquentSluggable\Sluggable;
use DataTables;

class Product extends \Eloquent
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
        'views'
    ];

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }


    public static function getDataTables($request)
    {
        $product = static::select('*')->with('tags');

        $modules = Module::where('content', 'products')->pluck('value', 'type')->all();

        return DataTables::of($product)
            ->filter(function ($query) use ($request) {
                if ($request->filled('title')) {
                    $query->where('title', 'like', '%' . $request->get('title') . '%');
                }

                if ($request->filled('status')) {
                    $query->where('status', $request->get('status'));
                }
            })
            ->addColumn('action', function ($product) use ($modules) {
                $response = '<a class="table-action-btn" title="Chỉnh sửa product" href="' . route('products.edit', $product->id) . '"><i class="fa fa-pencil text-success"></i></a>';

                $i = 0;

                foreach (Helpers::getModules('products') as $key => $value) {
                    $i ++;
                    if (isset($modules[$key]) && $modules[$key] == $product->id) {
                        $response .= '<a class="table-action-btn" data-type="'.$key.'" data-content="products" data-value="'.$product->id.'" data-url="' . route('modules.remove') . '" id="btn-module-'.$i.'-' . $product->id . '"  title="Off '.$value.'" href="javascript:;"><i class="fa fa-unlock text-danger"></i></a>';
                    } else {
                        $response .= '<a class="table-action-btn" data-type="'.$key.'" data-content="products" data-value="'.$product->id.'" data-url="' . route('modules.add') . '" id="btn-module-'.$i.'-' . $product->id . '"  title="On '.$value.'" href="javascript:;"><i class="fa fa-lock text-success"></i></a>';
                    }
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
            ->editColumn('status', function ($product) {
                return $product->status ? '<i class="ion ion-checkmark-circled text-success"></i>' : '<i class="ion ion-close-circled text-danger"></i>';
            })
            ->rawColumns(['action', 'status', 'avatar', 'tags', 'additions'])
            ->make(true);
    }


}
