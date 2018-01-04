<?php

namespace App\Models;

use App\Lib\Helpers;
use Cviebrock\EloquentSluggable\Sluggable;
use Cviebrock\EloquentSluggable\SluggableScopeHelpers;
use DataTables;

class Question extends \Eloquent
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
        'question',
        'answer',
        'person',
        'short_answer',
        'views'
    ];

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }

    public function scopePublish($query)
    {
        $query->where('status', true);
    }



    public static function getDataTables($request)
    {
        $question = static::select('*')->with('tags');

        $modules = Module::where('content', 'questions')->get();

        return DataTables::of($question)
            ->filter(function ($query) use ($request) {
                if ($request->filled('title')) {
                    $query->where('title', 'like', '%' . $request->get('title') . '%');
                }

                if ($request->filled('status')) {
                    $query->where('status', $request->get('status'));
                }
            })
            ->addColumn('action', function ($question) use ($modules) {
                $response = '<a class="table-action-btn" title="Chỉnh sửa question" href="' . route('questions.edit', $question->id) . '"><i class="fa fa-pencil text-success"></i></a>';

                $i = 0;

                foreach (Helpers::getModules('questions') as $key => $value) {
                    $i ++;

                    $inModule = false;

                    foreach ($modules as $module) {
                        if ($module->type == $key && $module->value == $question->id) {
                            $inModule = true;
                        }
                    }


                    if ($inModule) {
                        $response .= '<a class="table-action-btn" data-type="'.$key.'" data-content="questions" data-value="'.$question->id.'" data-url="' . route('modules.remove') . '" id="btn-module-'.$i.'-' . $question->id . '"  title="Off '.$value.'" href="javascript:;"><i class="fa fa-unlock text-danger"></i></a>';
                    } else {
                        $response .= '<a class="table-action-btn" data-type="'.$key.'" data-content="questions" data-value="'.$question->id.'" data-url="' . route('modules.add') . '" id="btn-module-'.$i.'-' . $question->id . '"  title="On '.$value.'" href="javascript:;"><i class="fa fa-lock text-success"></i></a>';
                    }
                }

                return $response;

            })
            ->addColumn('avatar', function ($question) {
                return $question->image ? '<img src="'.url('img/cache/small/'.$question->image).'" />' : '';
            })
            ->addColumn('tags', function ($question) {
                $tags = '';

                foreach ($question->tags as $tag) {
                    $tags .= '&nbsp;&nbsp;<span style="background-color: #e3e3e3">' . $tag->name . '</span>';
                }

                return $tags;
            })
            ->editColumn('status', function ($question) {
                return $question->status ? '<i class="ion ion-checkmark-circled text-success"></i>' : '<i class="ion ion-close-circled text-danger"></i>';
            })
            ->rawColumns(['action', 'status', 'avatar', 'tags'])
            ->make(true);
    }


}
