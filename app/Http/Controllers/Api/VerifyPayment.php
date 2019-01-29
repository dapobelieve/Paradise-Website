<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Transaction;
use App\Student;
use App\Payment;
use GuzzleHttp\Client;

class VerifyPayment extends Controller
{
    /**
     * @param $ref
     * transaction reference
     * @return Boolean
     */
    public function verify(Transaction $transaction, $ref)
    {

        $client = new Client();

        $response = $client->request('GET', "https://api.paystack.co/transaction/verify/{$ref}",  [
            'headers' => [
                'Authorization' => 'Bearer '.config('site.keys.paystack_sk'),
                'Accept' => 'application/json'
            ],
        ]);

        $res = json_decode($response->getBody()->getContents(), true);

//

        $student = $transaction->student;

        if ( $res['data']['status'] === 'success') {
            // payment successful

            $status = $res['data']['amount'] !== 1975000;

            $payment = Payment::create([
                'student_id' => $student->id,
                'amount'     => $res['data']['amount'],
                'trxn_ref'   => $res['data']['reference'],
                'support'     => $status
            ]);

            return response()->json($payment);
        }else {
            return response()->json($res['data']['gateway_response'], 500);
        }

    }
}
