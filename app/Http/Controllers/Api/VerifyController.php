<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Student;

/**
 * to Verify a registration record before payment
 */
class VerifyController extends Controller
{
    public function hasPaid(Student $student)
    {
        return response()->json(is_null($student->has('payment')->first()));
        // return 
    }
}
