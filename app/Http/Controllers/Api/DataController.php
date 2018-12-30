<?php

namespace App\Http\Controllers\Api;

use App\State;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DataController extends Controller
{
    public function getStates()
    {
        $states = State::with('locations')->get();
        return response()->json($states);
    }
}
