<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Image extends Model
{
    use SoftDeletes;

    protected  $fillable = ['url'];

    public function imageable()
    {
        return $this->morphTo();
    }

    public function getImageAttribute()
    {
        return  !is_null($this->url) ? JSON_decode($this->url, true)['secure_url'] : null;
    }
}
