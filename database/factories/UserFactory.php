<?php

use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(App\User::class, function (Faker $faker) {
    static $password;

    return [
        'nama' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'gender' => $faker->randomElement(['Laki-Laki', 'Perempuan']),
        'remember_token' => str_random(10),
        'alamat' => $faker->address,
        'onesignal_player_id' => null,
        'no_telp' => $faker->tollFreePhoneNumber,
        'foto' => $faker->imageUrl(600, 600, 'cats'),
        'bio' => $faker->sentence,
        'kecamatan_id' => function(){
            return factory('App\Kecamatan')->create()->id;
        },
        'kabupaten_id' => function(){
            return factory('App\Kabupaten')->create()->id;
        }
    ];
});
