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


        $student = $transaction->student;

        // check if user paid for support
        $status = $res['data']['amount'] !== 1975000;

        if ( $res['data']['status'] === 'success') {
            // payment successful

            //create a payment record
            $payment = Payment::create([
                'student_id' => $student->id,
                'amount'     => $res['data']['amount'],
                'trxn_ref'   => $res['data']['reference'],
                'support'     => $status
            ]);

            //update the transaction record
            $transaction = $transaction->update([
                'student_id' => $student->id,
                'payment_id' => $payment->id,
                'amount'     => $res['data']['amount'],
                'status'     => 'PAID',
                'meta'   => json_encode($res['data']),
                'pay_ref'   => $res['data']['reference'],
            ]);

            //send payment email here

            return response()->json($payment);
        }else {
//            return response()->json($res);
            $transaction = $transaction->update([
                'student_id' => $student->id,
                'amount'     => $res['data']['amount'],
                'status'     => 'NOT PAID',
                'meta'   => json_encode($res['data']),
                'pay_ref'   => $res['data']['reference'],
            ]);
            return response()->json($res['data']['gateway_response'], 500);
        }

    }
}
