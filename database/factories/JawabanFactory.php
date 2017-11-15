<?php

use Faker\Generator as Faker;

$factory->define(App\Jawaban::class, function (Faker $faker) {
    return [
        'pertanyaan_id' => function(){
        	return factory('App\Pertanyaan')->create()->id;
        },
        'konten' => $faker->paragraph,
        'foto' => $faker->imageUrl(800, 600, 'food', true, 'Faker'),
        'subject_id' => function(){
        	return factory('App\User')->create()->id;
        },
        'subject_type' => '',
    ];
});
