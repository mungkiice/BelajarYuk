<?php

use Faker\Generator as Faker;

$factory->define(App\Pertanyaan::class, function (Faker $faker) {
    return [
        'user_id' => function(){
        	return factory('App\User')->create()->id;
        },
        'pelajaran_id' => function(){
        	return factory('App\Pelajaran')->create()->id;
        },
        'judul' => $faker->sentence,
        'konten' => $faker->paragraph,
        'foto' => $faker->imageUrl(800, 600, 'food', true, 'Faker'),
        'terjawab' => $faker->boolean,
    ];
});
