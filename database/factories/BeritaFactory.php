<?php

use Faker\Generator as Faker;

$factory->define(App\Berita::class, function (Faker $faker) {
    return [
        'judul' => $faker->sentence,
        'foto' => $faker->imageUrl(800, 600, 'people', true, 'Faker'),
        'deskripsi' => $faker->paragraph,
        'sumber' => $faker->url,
    ];
});
