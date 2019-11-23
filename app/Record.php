<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Record extends Model
{
    use SoftDeletes;
    protected  $guarded = [];
    protected $dates = ['paid_at'];

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
