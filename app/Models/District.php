<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;

class District extends \Eloquent
{

    use Sluggable;

    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'name',
                'onUpdate' => true,
            ]
        ];
    }

    protected $fillable = [
        'name',
        'slug',
        'province_id'
    ];

    protected $connection = 'static';


    public function stores()
    {
        return $this->hasMany(Store::class);
    }

    public function province()
    {
        return $this->belongsTo(Province::class);
    }

}
