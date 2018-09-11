<?php

namespace App\Http\Controllers\Store;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Store;

class StoreController extends Controller
{
    public function index()
    {
        $store = Store::all();
        return response()->json($store);
    }
}
