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
        'views',
        'user_id'
    ];

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
        $question = static::select('*')->with('tags')->orderBy('created_at', 'desc');

        $modules = Module::where('content', 'questions')->get();

        $user = \Sentinel::getUser();

        return DataTables::of($question)
            ->filter(function ($query) use ($request) {
                if ($request->filled('title')) {
                    $query->where('title', 'like', '%' . $request->get('title') . '%');
                }

                if ($request->filled('status')) {
                    $query->where('status', $request->get('status'));
                }
            })
            ->addColumn('action', function ($question) use ($modules, $user) {
                $response = null;

                if ($user->hasAccess(['questions.edit'])) {
                    $response .= '<a class="table-action-btn" title="Chỉnh sửa câu hỏi" href="' . route('questions.edit', $question->id) . '"><i class="fa fa-pencil text-success"></i></a>';
                }

                $response .= '<a class="table-action-btn" title="View câu hỏi" target="_blank" href="' . route('frontend.question',$question->slug) . '"><i class="fa fa-signing text-warning"></i></a>';

                if ($user->hasAccess(['questions.destroy'])) {
                    $response .= '<a class="table-action-btn" id="btn-delete-'.$question->id.'" title="Remove câu hỏi" data-url="' . route('questions.destroy', $question->id) . '"><i class="fa fa-remove text-danger"></i></a>';
                }

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

            ->addColumn('user_name', function ($question) {
                return ($question->user) ? $question->user->name : 'Admin';
            })
            ->addColumn('histories', function ($question) {
                $histories = '';

                $logs = Event::where('content', 'questions')
                    ->where('content_id', $question->id)
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
            ->editColumn('status', function ($question) use ($user) {

                $response = null;
                $response .= $question->status ? '<i class="ion ion-checkmark-circled text-success"></i>' : '<i class="ion ion-close-circled text-danger"></i>';

                if ($user->hasAccess(['questions.approve'])) {
                    $response .= '<a class="table-action-btn" id="btn-adjust-'.$question->id.'" title="Duyệt câu hỏi" data-url="' . route('questions.approve', $question->id) . '" href="javascript:;"><i class="fa fa-adjust text-success"></i></a>';
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
            ->rawColumns(['action', 'status', 'avatar', 'tags', 'histories'])
            ->make(true);
    }


}
