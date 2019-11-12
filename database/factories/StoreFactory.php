<?php

use Faker\Generator as Faker;

$factory->define(App\Store::class, function (Faker $faker) {
    return [
        'title' => $faker->sentence(5, true),
        'slug'  => str_slug($faker->sentence(2, true)),
        'price' => $faker->randomFloat(1, 20, 2000),
        'body'  => $faker->sentence(35),
    ];
});
