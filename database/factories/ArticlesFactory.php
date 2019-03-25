<?php

use Faker\Generator as Faker;

$factory->define('App\Article', function (Faker $faker) {
    return [
        'name' => $faker->unique()->word,
        'description' => $faker->paragraph,
        'specification' => $faker->text,
        'price' => rand(10, 9999)/100,
        'quantity' => rand(10, 500),
        'sku' => rand(100000, 999999)
    ];
});
