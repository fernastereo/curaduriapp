<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Solicitud;
use App\Solicitudanexo;
use Faker\Generator as Faker;

$factory->define(Solicitudanexo::class, function (Faker $faker) {
    return [
        'file'              => str_random(10) . '.' . $faker->fileExtension,
        'solicitud_id'      => Solicitud::all()->random()->id,
    ];
});
