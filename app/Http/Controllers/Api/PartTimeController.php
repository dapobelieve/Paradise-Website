<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Student;
use Hash;

class PartTimeController extends Controller
{
    //create user account using email & password fields
    // private function createUserAccount($email, $password)
    // {
    //     // $this->validate()
        

    //     return $user;
    // }

    public function save(Request $request)
    {
        // return response()->json($request->all());
        $this->validate($request, [
            'email'    => 'required|email|unique:users,email',
            'name'    => 'required|string',
            'password' => 'required|min:6'
        ], [
            'email.required' => 'Email Required',
            'name.required' => 'Enter your full name',
            'password.required' => 'Enter a 6 character password'
        ]);

        $user = User::firstOrCreate([
            'email' => $request->email,
            'name' => $request->name,
            'password' => Hash::make($request->name)
        ]);

        return response()->json($user);
        
    }
    
    // create student account
    
    // contact info
    
    // 
}
