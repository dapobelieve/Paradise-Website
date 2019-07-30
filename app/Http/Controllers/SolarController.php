<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Training;

class SolarController extends Controller
{
    public function save (Request $request)
    {
        $this->validate($request, [
            'fname' => 'required',
            'email' => 'required|unique:trainings,email|email',
            'phone' => 'required|unique:trainings,phone|digits:11',
            'status' => 'required',
            'address' => 'required'
        ], [
            'fname.required' => 'Enter your full name',
            'email.required' => 'Enter a valid email address',
            'email.unique'   => 'Email address already exits on our servers',
            'email.email'    => 'Enter a valid email address',
            'phone.required' => 'Enter a valid phone Number',
            'phone.unique'   => 'Phone number address already exits on our servers',
            'phone.digits'    => 'Enter a valid 11 digit phone number',
            'status.required' => 'Select if you\'re a student or not',
            'address.required'  => 'Enter your contact address'

        ]);

        Training::firstOrCreate([
            'name' => $request->fname,
            'email' => $request->email,
            'phone' => $request->phone,
            'type' => $request->status,
            'address' => $request->address,
        ]);

        return view('site.solar')->with([
            'message' => 'Registration Successful'
        ])
    }

    public function index()
    {
        $users = Training::all();

        return view('admin.solar', compact('users'));
    }
    
}
