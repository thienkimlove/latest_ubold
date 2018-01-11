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
        'views',
        'user_id'
    ];

    public function scopePublish($query)
    {
        $query->where('status', true);
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }


    public static function getDataTables($request)
    {
        $video = static::select('*')->with('tags')->orderBy('created_at', 'desc');

        $modules = Module::where('content', 'videos')->get();

        $user = \Sentinel::getUser();

        return DataTables::of($video)
            ->filter(function ($query) use ($request) {
                if ($request->filled('title')) {
                    $query->where('title', 'like', '%' . $request->get('title') . '%');
                }

                if ($request->filled('status')) {
                    $query->where('status', $request->get('status'));
                }
            })
            ->addColumn('action', function ($video) use ($modules, $user) {
                $response = null;

                if ($user->hasAccess(['videos.edit'])) {
                    $response .= '<a class="table-action-btn" title="Chỉnh sửa video" href="' . route('videos.edit', $video->id) . '"><i class="fa fa-pencil text-success"></i></a>';
                }

                $response .= '<a class="table-action-btn" title="View video" target="_blank" href="' . url('video',$video->slug) . '"><i class="fa fa-signing text-warning"></i></a>';

                if ($user->hasAccess(['videos.destroy'])) {
                    $response .= '<a class="table-action-btn" id="btn-delete-'.$video->id.'" title="Remove video" data-url="' . route('videos.destroy', $video->id) . '"><i class="fa fa-remove text-danger"></i></a>';
                }

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

            ->addColumn('user_name', function ($video) {
                return ($video->user) ? $video->user->name : 'Admin';
            })
            ->addColumn('histories', function ($video) {
                $histories = '';

                $logs = Event::where('content', 'videos')
                    ->where('content_id', $video->id)
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
            ->editColumn('status', function ($video) use ($user) {

                $response = null;
                $response .= $video->status ? '<i class="ion ion-checkmark-circled text-success"></i>' : '<i class="ion ion-close-circled text-danger"></i>';

                if ($user->hasAccess(['videos.approve'])) {
                    $response .= '<a class="table-action-btn" id="btn-adjust-'.$video->id.'" title="Duyệt Video" data-url="' . route('videos.approve', $video->id) . '" href="javascript:;"><i class="fa fa-adjust text-success"></i></a>';
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
            ->rawColumns(['action', 'status', 'avatar', 'tags', 'histories'])
            ->make(true);
    }


}
