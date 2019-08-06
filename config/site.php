<?php

return [
    'defaults' => [
        'name' => 'Paradise Digital World',
        'session' => '2018/2019',
        'regPrice' => 3000,
        'supportPrice' => 2500,
        'email' => env('APP_EMAIL')
    ],
    'keys' => [
        'paystack_sk_demo' => 'sk_test_f7bfe6376e280ac4c9527543d96109f99fd1ee7b',
        'paystack_sk' => 'sk_live_d4620909ff8033206089860661a035b02de36ea4'
    ]
];