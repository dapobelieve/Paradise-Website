<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
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
