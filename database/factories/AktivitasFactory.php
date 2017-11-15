<?php

use Faker\Generator as Faker;

$factory->define(App\Activity::class, function (Faker $faker) {
    return [
        'user_id' => function(){
        	return factory('App\User')->create()->id;
        },
        'type' => 'created',
        'subject_id' => function(){
        	return factory('App\Pertanyaan')->create()->id;
        },
        'subject_type' => 'App\Pertanyaan',
    ];
});
