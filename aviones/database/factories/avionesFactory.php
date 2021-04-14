<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\aviones;
use Faker\Generator as Faker;

$factory->define(aviones::class, function (Faker $faker) {

    return [
        'codigoid' => $faker->word,
        'empresa_id' => $faker->randomDigitNotNull,
        'modelo' => $faker->word,
        'capacidad' => $faker->randomDigitNotNull,
        'disponibilidad' => $faker->randomDigitNotNull,
        'descripcion' => $faker->word,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});
