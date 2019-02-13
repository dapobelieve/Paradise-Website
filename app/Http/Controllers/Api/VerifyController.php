<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Transaction;

/**
 * to Verify a registration transaction record before payment
 */
class VerifyController extends Controller
{
    public function verifyTransaction(Request $request, $code)
    {
        $transaction = Transaction::where('trxn_ref', $code)->first();

        // transaction doesnt exist
        if (!$transaction) {
            return response()->json('Invalid Transaction Reference', 500);
        }

        // transaction has been paid for
        if ($transaction->status === 'PAID') {
            return response()->json('Transaction already paid for', 500);
        }

        return response()->json($transaction);
    }

    public function updateRefCode (Transaction $transaction)
    {
        $transaction->update([
            'used' => 1
        ]);

        return response()->json($transaction);
    }
}
