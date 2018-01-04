<?php

namespace App\Models;

use App\Lib\Helpers;
use Cviebrock\EloquentSluggable\Sluggable;
use Cviebrock\EloquentSluggable\SluggableScopeHelpers;
use DataTables;

class Video extends \Eloquent
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
        'url',
        'code',
        'views'
    ];

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }


    public static function getDataTables($request)
    {
        $video = static::select('*')->with('tags');

        $modules = Module::where('content', 'videos')->get();
        return DataTables::of($video)
            ->filter(function ($query) use ($request) {
                if ($request->filled('title')) {
                    $query->where('title', 'like', '%' . $request->get('title') . '%');
                }

                if ($request->filled('status')) {
                    $query->where('status', $request->get('status'));
                }
            })
            ->addColumn('action', function ($video) use ($modules) {
                $response = '<a class="table-action-btn" title="Chỉnh sửa video" href="' . route('videos.edit', $video->id) . '"><i class="fa fa-pencil text-success"></i></a>';

                $i = 0;

                foreach (Helpers::getModules('videos') as $key => $value) {
                    $i ++;

                    $inModule = false;

                    foreach ($modules as $module) {
                        if ($module->type == $key && $module->value == $video->id) {
                            $inModule = true;
                        }
                    }


                    if ($inModule) {
                        $response .= '<a class="table-action-btn" data-type="'.$key.'" data-content="videos" data-value="'.$video->id.'" data-url="' . route('modules.remove') . '" id="btn-module-'.$i.'-' . $video->id . '"  title="Off '.$value.'" href="javascript:;"><i class="fa fa-unlock text-danger"></i></a>';
                    } else {
                        $response .= '<a class="table-action-btn" data-type="'.$key.'" data-content="videos" data-value="'.$video->id.'" data-url="' . route('modules.add') . '" id="btn-module-'.$i.'-' . $video->id . '"  title="On '.$value.'" href="javascript:;"><i class="fa fa-lock text-success"></i></a>';
                    }
                }

                return $response;

            })
            ->addColumn('avatar', function ($video) {
                return $video->image ? '<img src="'.url('img/cache/small/'.$video->image).'" />' : '';
            })
            ->addColumn('tags', function ($video) {
                $tags = '';

                foreach ($video->tags as $tag) {
                    $tags .= '&nbsp;&nbsp;<span style="background-color: #e3e3e3">' . $tag->name . '</span>';
                }

                return $tags;
            })
            ->editColumn('status', function ($video) {
                return $video->status ? '<i class="ion ion-checkmark-circled text-success"></i>' : '<i class="ion ion-close-circled text-danger"></i>';
            })
            ->rawColumns(['action', 'status', 'avatar', 'tags'])
            ->make(true);
    }


}
