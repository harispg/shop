<?php

use Faker\Generator as Faker;

$factory->define('App\Photo', function (Faker $faker) {
	static $broj = 1;
	$path = 'Images/dummyPics/' . $broj . '.jpg';
    $thumbnail_path = 'Images/dummyPics/tn-' . $broj . '.jpg';
    $thumbnail_small = 'Images/dummyPics/sm-' . $broj . '.jpg';

    $broj++;
    if($broj>20){
        $broj = 1;
    }
    return [
        
        'name' => $faker->word,
        'path' => $path,
        'thumbnail_path' => $thumbnail_path,
        'thumbnail_small' => $thumbnail_small,
    ];
});
