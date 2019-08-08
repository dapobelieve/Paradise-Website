<?php
namespace App\Traits;


use GuzzleHttp\Client;


trait PayStackVerify
{
    public function verifyTransaction($ref)
    {
        $client = new Client();

        $response = $client->request('GET', "https://api.paystack.co/transaction/verify/{$ref}",  [
            'headers' => [
                'Authorization' => 'Bearer '.config('site.keys.paystack_sk_demo'),
                'Accept' => 'application/json'
            ],
        ]);

       return json_decode($response->getBody()->getContents(), true);
    }

}