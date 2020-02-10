<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Service extends Model
{
    use SoftDeletes;

    protected $guarded = [];

    public function images()
    {
        return $this->morphMany('App\Image', 'imageable');
    }

}
