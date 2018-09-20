<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;
use Hash;
use App\User;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $this->validate($request,[
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if(!Auth::attempt(
            [
                'email' => $request->input('email'),
                'password' => $request->input('password')
            ])){
            
            return redirect()->back()->with('errorMessage','Could not sign you in. Invalid Details');
        }

        return redirect()->route('site.home');
    }

    public function register(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email|unique:users,email',
            'fname' => 'required|string',
            'password' => 'required|min:6'
        ], [
            'fname.required' => 'Enter your full name',
            'password.required' => 'Enter a 6 character password'
        ]);

        User::firstOrCreate([
            'email' => $request->email,
            'name'  => $request->fname,
            'password' => Hash::make($request->password)
        ]);

        return redirect()->route('site.home');
    }

    public function logout(Request $request)
    {
        Auth::logout();

        return redirect()->route('site.home');
    }
    
}
