<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\reservas;
use Faker\Generator as Faker;

$factory->define(reservas::class, function (Faker $faker) {

    return [
        'cliente_id' => $faker->randomDigitNotNull,
        'vuelo_id' => $faker->randomDigitNotNull,
        'tarifa_id' => $faker->randomDigitNotNull,
        'avion_id' => $faker->randomDigitNotNull,
        'tipoReserva_id' => $faker->randomDigitNotNull,
        'fecha' => $faker->date('Y-m-d H:i:s'),
        'estado' => $faker->word,
        'cantidad' => $faker->randomDigitNotNull,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});
