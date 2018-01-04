<?php

namespace App\Models;

use DataTables;

class Contact extends \Eloquent
{

    protected $fillable = [
        'title',
        'name',
        'phone',
        'email',
        'content',
        'status',
    ];

    public static function getDataTables($request)
    {
        $contact = static::select('*');

        return DataTables::of($contact)
            ->filter(function ($query) use ($request) {
                if ($request->filled('name')) {
                    $query->where('name', 'like', '%' . $request->get('name') . '%');
                }

                if ($request->filled('status')) {
                    $query->where('status', $request->get('status'));
                }

            })
            ->addColumn('action', function ($contact) {
                return '<a class="table-action-btn" title="Chỉnh sửa Contact" href="' . route('contacts.edit', $contact->id) . '"><i class="fa fa-pencil text-success"></i></a>';
            })
           ->editColumn('status', function ($contact) {
                return config('system.customer_content_status.'.$contact->status);
            })
            ->rawColumns(['action', 'status'])
            ->make(true);
    }


}
