<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Training;
use GuzzleHttp\Client;

class SolarController extends Controller
{
    public function save (Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|unique:trainings,email|email',
            'phone' => 'required|unique:trainings,phone|digits:11',
            'status' => 'required',
            'address' => 'required',
        ], [
            'name.required' => 'Enter your full name',
            'email.required' => 'Enter a valid email address',
            'email.unique'   => 'Email address already exits on our servers',
            'email.email'    => 'Enter a valid email address',
            'phone.required' => 'Enter a valid phone Number',
            'phone.unique'   => 'Phone number address already exits on our servers',
            'phone.digits'    => 'Enter a valid 11 digit phone number',
            'status.required' => 'Select if you\'re a student or not',
            'address.required'  => 'Enter your contact address'

        ]);

        // check if reference code is in the request

        // validate transaction
        $paymentDetails = $this->validatePayment($request->reference);

        if ($paymentDetails['data']['status']  === 'success') {
            $training = Training::firstOrCreate([
                'name' => $request->name,
                'email' => $request->email,
                'phone' => $request->phone,
                'type' => $request->status,
                'address' => $request->address,
                'ref' => $request->reference,
                'p_status' => true
            ]);

            // send mail here

            return response()->json([
                'message' => 'Registration Successful',
                'training' => $training
            ], 201);
        }

        return response()->json([

        ], 500);




    }

    public function index()
    {
        $users = Training::all();

        return view('admin.solar', compact('users'));
    }

    private function validatePayment($ref)
    {
        $client = new Client();

        $response = $client->request('GET', "https://api.paystack.co/transaction/verify/{$ref}",  [
            'headers' => [
                'Authorization' => 'Bearer '.config('site.keys.paystack_sk'),
                'Accept' => 'application/json'
            ],
        ]);

        return json_decode($response->getBody()->getContents(), true);

    }

}
