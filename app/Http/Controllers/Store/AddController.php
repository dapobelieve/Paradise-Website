<?php

namespace App\Http\Controllers\Store;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Store;

class AddController extends Controller
{
    public function store(Request $request)
    {
        // validate the product here
        
        Store::create([
            'title' => $request->title
        ]);

    }
}
