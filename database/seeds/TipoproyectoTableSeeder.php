<?php

use App\Tipoproyecto;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TipoproyectoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tipoproyectos')->insert([
            ['nombre' => 'VIVIENDA UNIFAMILIAR', 'estado' => Tipoproyecto::TIPOPROYECTO_ACTIVO],
            ['nombre' => 'VIVIENDA BIFAMILIAR', 'estado' => Tipoproyecto::TIPOPROYECTO_ACTIVO],
            ['nombre' => 'VIVIENDA MULTIFAMILIAR', 'estado' => Tipoproyecto::TIPOPROYECTO_ACTIVO],
            ['nombre' => 'DOTACIONAL DESTINADO A SALUD O EDUCACION', 'estado' => Tipoproyecto::TIPOPROYECTO_ACTIVO],
        ]);
    }
}
