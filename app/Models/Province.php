<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;

class Province extends \Eloquent
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
        'domain'
    ];

    protected $connection = 'static';

    public function districts()
    {
        return $this->hasMany(District::class);
    }



}
