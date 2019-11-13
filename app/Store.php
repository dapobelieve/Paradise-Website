<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Store extends Model
{

    protected $fillable = [
        'title',
        'price',
        'image',
        'body',
        'slug',
    ];
    public function cart()
    {
        return $this->hasMany(Detail::class, 'store_id');
    }
}
