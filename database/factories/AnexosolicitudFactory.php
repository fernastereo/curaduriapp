<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use App\Solicitud;
use App\Anexosolicitud;
use Faker\Generator as Faker;

$factory->define(Anexosolicitud::class, function (Faker $faker) {
    return [
        'file'              => str_random(10) . '.' . $faker->fileExtension,
        'solicitud_id'      => Solicitud::all()->random()->id,
    ];
});
