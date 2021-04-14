<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\empresas;
use Faker\Generator as Faker;

$factory->define(empresas::class, function (Faker $faker) {

    return [
        'companie' => $faker->word,
        'nit' => $faker->word,
        'correo' => $faker->word,
        'representante' => $faker->word,
        'telefono' => $faker->word,
        'direccion' => $faker->word,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});
