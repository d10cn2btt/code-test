<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\User::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('gucms'),
        'remember_token' => str_random(10),
    ];
});


$factory->define(\App\Models\L25::class, function (\Faker\Generator $faker) {
    return [
        'name' => $faker->name,
        'parent' => $faker->numberBetween(1, 3),
        'priority' => $faker->numberBetween(1, 4),
    ];
});

$factory->define(\App\Models\L3::class, function (\Faker\Generator $faker) {
    return [
        'name' => $faker->name,
        'parent' => $faker->numberBetween(1, 4),
        'priority' => $faker->numberBetween(1, 20),
    ];
});

$factory->define(\App\Models\L35::class, function (\Faker\Generator $faker) {
    return [
        'name' => $faker->name,
        'parent' => $faker->numberBetween(1, 20),
        'priority' => $faker->numberBetween(1, 100),
    ];
});
