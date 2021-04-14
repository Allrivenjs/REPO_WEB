<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\vuelos;
use Faker\Generator as Faker;

$factory->define(vuelos::class, function (Faker $faker) {

    return [
        'origen' => $faker->word,
        'destino' => $faker->word,
        'fecha' => $faker->date('Y-m-d H:i:s'),
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});
