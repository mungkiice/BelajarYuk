<?php

use Faker\Generator as Faker;

$factory->define(App\Kecamatan::class, function (Faker $faker) {
    return [
        'kabupaten_id' => function(){
    		return factory('App\Kabupaten')->create()->id;
    	},
        'nama' => $faker->city,
    ];
});
