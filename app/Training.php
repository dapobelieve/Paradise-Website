<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Training extends Model
{
    protected $fillable = [
        'name',
        'email',
        'phone',
        'address',
        'type'
    ];
}
