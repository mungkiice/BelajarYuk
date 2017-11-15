<?php

use Faker\Generator as Faker;

$factory->define(App\Provinsi::class, function (Faker $faker) {
    return [
        'nama' => $faker->unique()->country,
    ];
});
