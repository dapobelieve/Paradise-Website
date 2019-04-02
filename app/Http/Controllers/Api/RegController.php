<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Student;

/**
 * Class RegController
 * @package App\Http\Controllers\Api
 * controls everything on the admin end of managing users registrations
 */
class RegController extends Controller
{
    public function index()
    {
        return view('admin.register');
    }

    public function  getAllReg(Request $request)
    {
        $students = Student::with('payment', 'results')->latest()->get();
        return response()->json($students);
    }

    // get a student
    public function getStudent(Student $student)
    {
        return response()->json($student->load('payment', 'results', 'user',  'state', 'lga', 'publications'));
    }
}
