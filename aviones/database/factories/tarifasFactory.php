<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\tarifas;
use Faker\Generator as Faker;

$factory->define(tarifas::class, function (Faker $faker) {

    return [
        'titulo' => $faker->word,
        'precio' => $faker->randomDigitNotNull,
        'descripcion' => $faker->word,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});
