<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Solicitante;
use Faker\Generator as Faker;

$factory->define(Solicitante::class, function (Faker $faker) {
    return [
        'identificacion'=> $faker->randomNumber(8, false),
        'dv'            => $faker->numberBetween(1, 9),
        'nombre'        => $faker->name,
        'telefono'      => $faker->phoneNumber,
        'email'         => $faker->freeEmail,
    ];
});
