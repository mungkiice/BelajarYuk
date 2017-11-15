<?php

use Faker\Generator as Faker;

$factory->define(App\Mengajar::class, function (Faker $faker) {
    return [
        'pelajaran_id' => function(){
        	return factory('App\Pelajaran')->create()->id;
        },
        'pengajar_id' => function(){
        	return factory('App\Pengajar')->create()->id;
        },
    ];
});
