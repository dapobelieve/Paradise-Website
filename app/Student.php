<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $guarded = [];
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function results ()
    {
        return $this->hasMany(Result::class);
    }

    public function transactions()
    {
        return $this->hasMany(Transaction::class);
    }

    public function payment()
    {
        return $this->hasOne(Payment::class);
    }
}
