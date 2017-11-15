<?php

use Faker\Generator as Faker;

$factory->define(App\Pengajar::class, function (Faker $faker) {
	static $password;
    return [
        'nama' => $faker->name,
        'foto'=>$faker->imageUrl(600, 600, 'cats'),     // 'http://lorempixel.com/800/600/cats/' //s
        'alamat' => $faker->address,
        'bio' => $faker->paragraph,
        'gender' => $faker->randomElement(['Laki-Laki', 'Perempuan']),
        'no_telp' => $faker->tollFreePhoneNumber,
        'no_ktp' => $faker->ean8,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'pendidikan_terakhir' => $faker->jobTitle,
        'tarif' => $faker->numberBetween(50000, 200000),
        'kecamatan_id' => function(){
            return factory('App\Kecamatan')->create()->id;
        },
        'kabupaten_id' => function(){
            return factory('App\Kabupaten')->create()->id;
        },
        'onesignal_player_id' => null,
        'aktif' => $faker->boolean,
        'remember_token' => str_random(10),
    ];
});
