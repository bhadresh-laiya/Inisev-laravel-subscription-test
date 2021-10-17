<?php

use Faker\Generator as Faker;

$factory->define(App\Posts::class, function (Faker $faker) {
    return [
        'title' => $faker->sentence(10),
        'description' => $faker->sentence(100),
    ];
});
