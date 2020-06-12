<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Recipes;
use Faker\Generator as Faker;

$factory->define(Recipes::class, function (Faker $faker) {
    return [
        'user_id'     => factory(App\User::class),
        'title'       => $faker->word,
        'ingredients' => json_encode($faker->sentences(3)),
        'methods'     => json_encode($faker->sentences(3)),
        'notes'       => $faker->paragraph,
        'image_url'   => 'rough-puff.jpg'
    ];
});
