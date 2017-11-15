<?php

use Faker\Generator as Faker;

$factory->define(App\Kursus::class, function (Faker $faker) {
    return [
        'pengajar_id' => function(){
        	return factory('App\Pengajar')->create()->id;
        },
        'user_id' => function(){
        	return factory('App\User')->create()->id;
        },
        'keterangan' => $faker->sentence,
        'total_pembayaran' => $faker->numberBetween(50000, 200000),
        'sesi' => $faker->numberBetween(1,3),
    ];
});
