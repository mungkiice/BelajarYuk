<?php

use Faker\Generator as Faker;

$factory->define(App\Kelurahan::class, function (Faker $faker) {
    return [
        'kecamatan_id' => function(){
    		return factory('App\Kecamatan')->create()->id;
    	},
        'nama' => $faker->streetName,
    ];
});
