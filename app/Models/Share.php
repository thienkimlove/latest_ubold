<?php

namespace App\Models;

use App\Lib\Helpers;
use Carbon\Carbon;
use DataTables;

class Share extends \Eloquent
{

    protected $fillable = [
        'name',
        'link',
        'short_desc',
        'desc',
        'address',
        'image',
        'status',
    ];

    public static function getDataTables($request)
    {
        $share = static::select('*')->orderBy('created_at', 'desc');

        $user = \Sentinel::getUser();

        return DataTables::of($share)
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
            ->addColumn('action', function ($share) use ($user) {

                $response = null;

                if ($user->hasAccess(['shares.edit'])) {
                    $response .= '<a class="table-action-btn" title="Chỉnh sửa Shares" href="' . route('shares.edit', $share->id) . '"><i class="fa fa-pencil text-success"></i></a>';
                }

                if ($user->hasAccess(['shares.destroy'])) {
                    $response .= '<a class="table-action-btn" id="btn-delete-'.$share->id.'" title="Remove Shares" data-url="' . route('shares.destroy', $share->id) . '"><i class="fa fa-remove text-danger"></i></a>';
                }


                $i = 0;

                $modules = Module::where('content', 'shares')->get();

                foreach (Helpers::getModules('shares') as $key => $value) {
                    $i ++;


                    $inModule = false;

                    foreach ($modules as $module) {
                        if ($module->type == $key && $module->value == $share->id) {
                            $inModule = true;
                        }
                    }

                    if ($inModule) {
                        $response .= '<a class="table-action-btn" data-type="'.$key.'" data-content="shares" data-value="'.$share->id.'" data-url="' . route('modules.remove') . '" id="btn-module-'.$i.'-' . $share->id . '"  title="Off '.$value.'" href="javascript:;"><i class="fa fa-unlock text-danger"></i></a>';
                    } else {
                        $response .= '<a class="table-action-btn" data-type="'.$key.'" data-content="shares" data-value="'.$share->id.'" data-url="' . route('modules.add') . '" id="btn-module-'.$i.'-' . $share->id . '"  title="On '.$value.'" href="javascript:;"><i class="fa fa-lock text-success"></i></a>';
                    }
                }

                return $response;

            })
            ->addColumn('histories', function ($share) {
                $histories = '';

                $logs = Event::where('content', 'shares')
                    ->where('content_id', $share->id)
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
            ->editColumn('status', function ($share) {
                return config('system.customer_content_status.'.$share->status);
            })
            ->rawColumns(['action', 'status', 'histories'])
            ->make(true);
    }

}
