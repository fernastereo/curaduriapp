<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Curaduria;
use App\Modalidad;
use App\Solicitud;
use App\Solicitante;
use App\Objetolicencia;
use Faker\Generator as Faker;

$factory->define(Solicitud::class, function (Faker $faker) {
    return [
        'curaduria_id'              => Curaduria::all()->random()->id,
        'objetolicencia_id'         => Objetolicencia::all()->random()->id,
        'licenciaanteriornumero'    => '',
        'licenciaanteriorvigencia'  => '',
        'modalidad_id'              => Modalidad::all()->random()->id,
        'solicitante_id'            => Solicitante::all()->random()->id,
        'descripcion'               => $faker->paragraph(1),
        'anexos'                    => $faker->numberBetween(1, 20),
        'token'                     => str_random(50),
    ];
});
