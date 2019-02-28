<?php

use Carbon\Carbon;
use Faker\Generator as Faker;

$factory->define(App\Category::class, function (Faker $faker) {
    return [
        'name' => $faker->safeColorName,
        'description' => $faker->paragraph,
        'created_at' => Carbon::now(),
    ];
});
