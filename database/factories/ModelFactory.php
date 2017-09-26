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
$factory->define(App\User::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
    ];
});
$factory->define(App\Persona::class, function (Faker\Generator $faker) {
    return [
        'nombre' => $faker->firstName,
        'apellido_1' => $faker->lastName,
        'apellido_2' => $faker->lastName,
        'email' => $faker->unique()->safeEmail,
        'fecha_nacimiento' => $faker->date($format = 'Y-m-d', $max = '-18 years'),
    ];
});
$factory->define(App\Organizacion::class, function (Faker\Generator $faker) {
    return [
        'razon_social' => $faker->Company,
        'email' => $faker->unique()->safeEmail,
        'pagina_web' => $faker->url,
    ];
});
