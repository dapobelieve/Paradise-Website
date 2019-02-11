<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Student;

class Publication extends Model
{
    public function user()
    {
        return $this->belongsTo(Student::class);
    }
}
