<?php

use App\Solicitud;
use Illuminate\Database\Seeder;

class SolicitudTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Solicitud::class, 30)->create();
    }
}
