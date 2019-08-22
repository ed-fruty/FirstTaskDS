<?php

use Faker\Generator as Faker;

$factory->define(App\Government::class, function (Faker $faker) {
    return [
        'name' => $faker->company,
        'user_id'   => '1'
    ];
});
