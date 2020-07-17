<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Recipes;
use Faker\Generator as Faker;

$factory->define(Recipes::class, function (Faker $faker) {
    return [
        'user_id'      => 1,
        'title'        => $faker->word,
        'cooking_time' => $faker->word,
        'ingredients'  => json_encode($faker->sentences(3)),
        'methods'      => json_encode($faker->sentences(3)),
        'image_url'    => 'Recipes/mains.jpg'
    ];
});
