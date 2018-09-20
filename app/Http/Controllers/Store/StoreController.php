<?php

namespace App\Http\Controllers\Store;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Store;
use App\Order;

class StoreController extends Controller
{
    public function index()
    {
        $store = Store::all();
        return response()->json($store);
    }

    public function record(Request $request)
    {
        // create the new order
        $order = Order::create([
            'name' => $request->userData['name'],
            'email' => $request->userData['email'],
            'phone' => $request->userData['phone'],
            'hash'  => str_random(10),
            'amount'  => 2548,
        ]);
        // $order = Order::first();

        // store the order details
        foreach ($request->cart as $cart) {
            $order->details()->create([
                'store_id' =>  $cart['product']['id'],
                'price' => $cart['product']['price'],
                'qty'   => $cart['quantity']
            ]);
        }


        return response()->json($order->hash);
    }
}
