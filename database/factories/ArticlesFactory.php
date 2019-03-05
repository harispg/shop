<?php

use Faker\Generator as Faker;

$factory->define('App\Article', function (Faker $faker) {
    return [
        'name' => $faker->colorName,
        'description' => $faker->paragraph,
        'specification' => $faker->text,
        'price' => 0.99,
        'quantity' => 99,
    ];
});
