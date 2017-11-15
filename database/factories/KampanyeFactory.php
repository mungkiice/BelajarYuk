<?php

use Faker\Generator as Faker;

$factory->define(App\Kampanye::class, function (Faker $faker) {
    return [
        'penggalang' => $faker->name,
        'foto' => $faker->imageUrl(800, 600, 'people', true, 'Faker'),
        'no_telp' => $faker->tollFreePhoneNumber,
        'alamat' => $faker->address,
        'judul' => $faker->sentence,
        'konten' => $faker->paragraph,
        'valid' => $faker->boolean,
    ];
});
