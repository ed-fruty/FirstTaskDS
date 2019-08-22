<?php

use Faker\Generator as Faker;

$factory->define(App\Member::class, function (Faker $faker) {


    
    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail, 
        'government_id' => $faker->numberBetween($min = 1, $max = 4)
    ];
});
