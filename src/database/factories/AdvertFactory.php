<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Advert;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

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

$factory->define(Advert::class, function (Faker $faker) {
    return [
        'title' => $faker->title,
        'price' => $faker->numberBetween(1, 1000),
        'description' => $faker->text,
        'pub_date' => now(),
        'city_id' => $faker->numberBetween(1, 10),
        'category_id' => $faker->numberBetween(1, 10),
        'user_id' => $faker->numberBetween(1, 10),
    ];
});
