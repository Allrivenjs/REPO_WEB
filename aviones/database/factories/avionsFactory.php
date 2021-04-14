<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\avions;
use Faker\Generator as Faker;

$factory->define(avions::class, function (Faker $faker) {

    return [
        'empresa' => $faker->word,
        'tipo' => $faker->word,
        'capacidad' => $faker->randomDigitNotNull,
        'longitud' => $faker->randomDigitNotNull,
        'velocidad' => $faker->randomDigitNotNull,
        'descripcion' => $faker->word,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});
