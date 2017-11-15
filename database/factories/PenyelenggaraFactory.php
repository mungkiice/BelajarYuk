<?php

use Faker\Generator as Faker;

$factory->define(App\Penyelenggara::class, function (Faker $faker) {
    return [
        'nama' => $faker->name,
        'instansi' => $faker->company,
        'no_telp' => $faker->tollFreePhoneNumber,
        'gender' => $faker->randomElement(['Laki-Laki', 'Perempuan']),
        'alamat' => $faker->address,
        'no_ktp' => $faker->unique()->ean8,
        'email' => $faker->unique()->safeEmail,
    ];
});
