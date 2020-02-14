<?php

use App\Objetolicencia;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ObjetolicenciasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('objetolicencias')->insert([
            ['nombre' => 'INICIAL', 'estado' => Objetolicencia::OBJETO_ACTIVO],
            ['nombre' => 'MODIFICACION', 'estado' => Objetolicencia::OBJETO_ACTIVO],
            ['nombre' => 'REVALIDACION', 'estado' => Objetolicencia::OBJETO_ACTIVO],
            ['nombre' => 'PRORROGA', 'estado' => Objetolicencia::OBJETO_ACTIVO],
            ['nombre' => 'PRORROGA (SEGUNDA)', 'estado' => Objetolicencia::OBJETO_ACTIVO],
        ]);
    }
}
