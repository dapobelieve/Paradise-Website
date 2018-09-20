<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Detail extends Model
{
    protected $fillable = [
        'store_id',
        'qty',
        'price'
    ];

    
    public function order()
    {
        return $this->belongsTo(Order::class);
    }
}
