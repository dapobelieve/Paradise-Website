<?php

use Carbon\Carbon;
use Faker\Generator as Faker;

$factory->define(App\Record::class, function (Faker $faker) {
    return [
        'user_id' => $faker->numberBetween(1, 3),
        'service' => $faker->sentence(6, false),
        'price'  => $faker->randomFloat(NULL, 100, 20000),
        'name'   => $faker->name(),
        'email'  => $faker->freeEmail(),
        'status' => 'NOT PAID',
        'ref' => str_random(12),
        'paid_at'  => $faker->dateTimeBetween('-30 days', 'now', 'Africa/Lagos'),
        'created_at'  => $faker->dateTimeBetween(Carbon::now()->startOfMonth(), 'now', 'Africa/Lagos')
    ];
});
