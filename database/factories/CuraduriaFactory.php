<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Ciudad;
use App\Curaduria;
use Faker\Generator as Faker;

$factory->define(Curaduria::class, function (Faker $faker) {
    return [
        'ciudad_id'     => Ciudad::all()->random(),
        'numero'        => $faker->randomElement([1, 2, 3]),
        'curador'       => $faker->name,
        'idcurador'     => $faker->randomNumber(8, false),
        'direccion'     => $faker->streetAddress,
        'telefono'      => $faker->phoneNumber,
        'email'         => $faker->freeEmail,
        'web'           => 'http://www.' . $faker->domainName,
        'logo'          => $faker->imageUrl($width = 250, $height = 250, 'business'),
        'fechaini'      =>$faker->dateTimeBetween($startDate = '-2 years', $endDate = 'now', $timezone = null),
        'estado'        => $faker->randomElement([Curaduria::CURADURIA_ACTIVA, Curaduria::CURADURIA_INACTIVA]),
    ];
});
