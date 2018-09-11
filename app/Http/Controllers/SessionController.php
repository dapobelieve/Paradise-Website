<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SessionController extends Controller
{
    public function index(Request $request)
    {
        $cart[0] = array(
            'name' => 'lade',
            'age'  => 36,
            'job'  => 'Web Artisan'
        );
        $cart[count($cart)] = array(
            'name' => 'dapo',
            'age'  => 36,
            'job'  => 'Designer'
        );

        $request->session()->put('cart', $cart);

        dd(count(session('cart')));
    }

    public function add(Request $request)
    {
        $cart[0] = array(
            'name' => 'lade',
            'age'  => 36,
            'job'  => 'Web Artisan'
        );
        
        $cart[count($cart)] = array(
            'name' => 'dapo',
            'age'  => 36,
            'job'  => 'Designer'
        );

        $request->session()->put('cart', $cart);

        $data = session()->get('cart');
        dd($data);
        // return response()->json($data);
        // create a muitdimentional array
        // 
        // check if product id is inside array
            // true => increase qty
            // false => add new item to array
    }
}
