<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\clientes;
use Faker\Generator as Faker;

$factory->define(clientes::class, function (Faker $faker) {

    return [
        'nombre' => $faker->word,
        'tipoId' => $faker->word,
        'identificacion' => $faker->word,
        'telefono' => $faker->word,
        'correo' => $faker->word,
        'direccion' => $faker->word,
        'edad' => $faker->randomDigitNotNull,
        'sexo' => $faker->word,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});
