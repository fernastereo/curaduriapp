<?php

use App\Estadoexpediente;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EstadoexpedientesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('estadoexpedientes')->insert([
            ['nombre' => 'RADICADO EN LEGAL Y DEBIDA FORMA', 'estado' => Estadoexpediente::ESTADO_ACTIVO],
            ['nombre' => 'RADICADO INCOMPLETO', 'estado' => Estadoexpediente::ESTADO_ACTIVO],
            ['nombre' => 'EN ESTUDIO TECNICO', 'estado' => Estadoexpediente::ESTADO_ACTIVO],
            ['nombre' => 'EN ESTUDIO JURIDICO', 'estado' => Estadoexpediente::ESTADO_ACTIVO],
            ['nombre' => 'EN ESTUDIO ESTRUCTURAL', 'estado' => Estadoexpediente::ESTADO_ACTIVO],
            ['nombre' => 'SUSPENDIDO (ACTA DE OBSERVACIONES)', 'estado' => Estadoexpediente::ESTADO_ACTIVO],
            ['nombre' => 'SUSPENDIDO (PRORROGA ACTA DE OBSERVACIONES)', 'estado' => Estadoexpediente::ESTADO_ACTIVO],
            ['nombre' => 'SUSPENDIDO (PAGO DE EXPENSAS / IMPUESTOS)', 'estado' => Estadoexpediente::ESTADO_ACTIVO],
            ['nombre' => 'PREPARACION DE RESOLUCION', 'estado' => Estadoexpediente::ESTADO_ACTIVO],
            ['nombre' => 'RESOLUCION EXPEDIDA', 'estado' => Estadoexpediente::ESTADO_ACTIVO],
            ['nombre' => 'DESISTIDA', 'estado' => Estadoexpediente::ESTADO_ACTIVO],
            ['nombre' => 'NEGADA', 'estado' => Estadoexpediente::ESTADO_ACTIVO],
        ]);
    }
}
