<?php

use Faker\Generator as Faker;

$factory->define(App\Kabupaten::class, function (Faker $faker) {
    return [
    	'provinsi_id' => function(){
    		return factory('App\Provinsi')->create()->id;
    	},
        'nama' => $faker->state,
    ];
});
