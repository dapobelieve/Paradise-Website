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

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function getFirstImage()
    {
        $imageUrl = $this->images()->first();
        if (!$imageUrl) {
            return "";
        }
        return json_decode($imageUrl->url, true)['secure_url'];
    }

    public function link()
    {
        return url('service-details/'.$this->slug);
    }

}
