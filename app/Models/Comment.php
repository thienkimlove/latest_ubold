<?php

namespace App\Models;

use Carbon\Carbon;
use DataTables;

class Comment extends \Eloquent
{

    protected $fillable = [       
        'name',
        'content_id',
        'content_type',
        'email',
        'content',
        'status',
    ];


    public static function getDataTables($request)
    {
        $comment = static::select('*')->orderBy('created_at', 'desc');

        $user = \Sentinel::getUser();

        return DataTables::of($comment)
            ->filter(function ($query) use ($request) {
                if ($request->filled('name')) {
                    $query->where('name', 'like', '%' . $request->get('name') . '%');
                }

                if ($request->filled('status')) {
                    $query->where('status', $request->get('status'));
                }

                if ($request->filled('date')) {
                    $dateRange = explode(' - ', $request->get('date'));
                    $query->whereDate('created_at', '>=', Carbon::createFromFormat('d/m/Y', $dateRange[0])->toDateString());
                    $query->whereDate('created_at', '<=', Carbon::createFromFormat('d/m/Y', $dateRange[1])->toDateString());
                }

            })
            ->addColumn('action', function ($comment) use ($user) {

                $response = null;

                if ($user->hasAccess(['comments.edit'])) {
                    $response .= '<a class="table-action-btn" title="Chỉnh sửa Comment" href="' . route('comments.edit', $comment->id) . '"><i class="fa fa-pencil text-success"></i></a>';
                }

                if ($user->hasAccess(['comments.destroy'])) {
                    $response .= '<a class="table-action-btn" id="btn-delete-'.$comment->id.'" title="Remove Comment" data-url="' . route('comments.destroy', $comment->id) . '"><i class="fa fa-remove text-danger"></i></a>';
                }

                $response .= '<a class="table-action-btn" id="btn-delete-'.$comment->id.'" title="Remove Comment" data-url="' . route('comments.destroy', $comment->id) . '"><i class="fa fa-remove text-danger"></i></a>';

                $url = null;

                if ($comment->content_type == 'posts') {
                    $tempContent = Post::find($comment->content_id);
                    if ($tempContent) {
                        $slug = $tempContent->slug;
                        $url = route('frontend.main', $slug).'.html';
                    }

                }
                if ($comment->content_type == 'questions') {
                    $tempContent = Question::find($comment->content_id);
                    if ($tempContent) {
                        $slug = $tempContent->slug;
                        $url = route('frontend.question', $slug);
                    }
                }

                $response .= '<a class="table-action-btn" title="View post" target="_blank" href="' . $url . '"><i class="fa fa-signing text-warning"></i></a>';


                return $response;

            })
            ->addColumn('histories', function ($comment) {
                $histories = '';

                $logs = Event::where('content', 'comments')
                    ->where('content_id', $comment->id)
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
            ->addColumn('content_name', function($comment) {
               if (($comment->content_type == 'posts') && ($tempContent = Post::find($comment->content_id))) {
                   return $tempContent->title;
               }
                if (($comment->content_type == 'questions') && ($tempContent = Question::find($comment->content_id))) {
                    return $tempContent->title;
                }
            })
           ->editColumn('status', function ($comment) {
                return config('system.comment_content_status.'.$comment->status);
            })
            ->rawColumns(['action', 'status', 'histories'])
            ->make(true);
    }



}
