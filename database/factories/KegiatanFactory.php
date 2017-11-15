<?php

use Faker\Generator as Faker;

$factory->define(App\Kegiatan::class, function (Faker $faker) {
    return [
        'penyelenggara_id' => function(){
        	return factory('App\Penyelenggara')->create()->id;
        },
        'judul' => $faker->sentence,
        'deskripsi' => $faker->paragraph,
        'foto' => $faker->imageUrl(800, 600, 'sports', true, 'Faker'),
        'thumbnail' => $faker->imageUrl(400, 300, 'transport', true, 'Faker'),
        'waktu' => $faker->date,
        'lokasi' => $faker->address,
    ];
});
