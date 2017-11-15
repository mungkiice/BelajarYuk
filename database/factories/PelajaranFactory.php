<?php

use Faker\Generator as Faker;

$factory->define(App\Pelajaran::class, function (Faker $faker) {
    return [
        'nama' => $faker->unique()->lastName,
    ];
});
