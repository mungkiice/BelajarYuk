<?php

use Faker\Generator as Faker;

$factory->define(App\Ulasan::class, function (Faker $faker) {
    return [
        'pengajar_id' => function(){
        	return factory('App\Pengajar')->create()->id;
        },
        'user_id' => function(){
        	return factory('App\User')->create()->id;
        },
        'ulasan' => $faker->sentence,
        'rating' => $faker->numberBetween(1,5),
    ];
});
