<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Property extends Model
{
    use SoftDeletes;

    protected $fillable = ['title', 'price', 'details', 'slug'];

    public function images()
    {
        return $this->morphMany('App\Image', 'imageable');
    }

    public function link()
    {
        return url('property-details/'.$this->slug);
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }
}
