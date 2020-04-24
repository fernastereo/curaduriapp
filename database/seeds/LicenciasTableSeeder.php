<?php

use App\Licencia;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LicenciasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $id = DB::table('licencias')->insertGetId(
            ['nombre' => 'CONSTRUCCION', 'abrev' => 'CONS', 'termino' => 24, 'tipolicencia' => Licencia::LICENCIA]
        );

        DB::table('modalidads')->insert([
            ['nombre' => 'ADECUACION', 'abrev' => 'ADEC', 'licencia_id' => $id],
            ['nombre' => 'AMPLIACION', 'abrev' => 'AMPL', 'licencia_id' => $id],
            ['nombre' => 'CERRAMIENTOS', 'abrev' => 'CERR', 'licencia_id' => $id],
            ['nombre' => 'DEMOLICION', 'abrev' => 'DEM', 'licencia_id' => $id],
            ['nombre' => 'MODIFICACION', 'abrev' => 'MOD', 'licencia_id' => $id],
            ['nombre' => 'OBRA NUEVA', 'abrev' => 'O.NUE', 'licencia_id' => $id],
            ['nombre' => 'RECONSTRUCCION', 'abrev' => 'REC', 'licencia_id' => $id],
            ['nombre' => 'REFORZAMIENTO ESTRUCTURAL', 'REF' => '433', 'licencia_id' => $id],
            ['nombre' => 'RESTAURACION', 'abrev' => 'REST', 'licencia_id' => $id],
        ]);

        $id = DB::table('licencias')->insertGetId(
            ['nombre' => 'PARCELACION', 'abrev' => 'PARC', 'termino' => 24, 'tipolicencia' => Licencia::LICENCIA]
        );
        DB::table('modalidads')->insert([
            ['nombre' => 'PARCELACION', 'abrev' => 'PARC', 'licencia_id' => $id],
        ]);


        $id = DB::table('licencias')->insertGetId(
            ['nombre' => 'RECONOCIMIENTO DE LA EXISTENCIA DE UNA EDIFICACION', 'abrev' => 'REC', 'termino' => 0, 'tipolicencia' => Licencia::ACTUACION]
        );
        DB::table('modalidads')->insert([
            ['nombre' => 'RECONOCIMIENTO', 'abrev' => 'REC', 'licencia_id' => $id],
        ]);

        $id = DB::table('licencias')->insertGetId(
            ['nombre' => 'SUBDIVISION', 'abrev' => 'SUBD', 'termino' => 6, 'tipolicencia' => Licencia::LICENCIA]
        );
        DB::table('modalidads')->insert([
            ['nombre' => 'SUBDIVISION RURAL', 'abrev' => 'S.RUR', 'licencia_id' => $id],
            ['nombre' => 'SUBDIVISION URBANA', 'abrev' => 'S.URB', 'licencia_id' => $id],
            ['nombre' => 'RELOTEO', 'abrev' => 'REL', 'licencia_id' => $id],
        ]);

        $id = DB::table('licencias')->insertGetId(
            ['nombre' => 'URBANIZACION', 'abrev' => 'URB', 'termino' => 24, 'tipolicencia' => Licencia::LICENCIA]
        );
        DB::table('modalidads')->insert([
            ['nombre' => 'REURBANIZACION', 'abrev' => 'REUR', 'licencia_id' => $id],
            ['nombre' => 'SANEAMIENTO', 'abrev' => 'SAN', 'licencia_id' => $id],
            ['nombre' => 'DESARROLLO', 'abrev' => 'DES', 'licencia_id' => $id],
        ]);

        $id = DB::table('licencias')->insertGetId(
            ['nombre' => 'OTRAS ACTUACIONES', 'abrev' => 'O.ACT', 'termino' => 0, 'tipolicencia' => Licencia::OTRASACTUACIONES]
        );
        DB::table('modalidads')->insert([
            ['nombre' => 'AJUSTE DE COTAS DE AREAS', 'abrev' => 'A.COT', 'licencia_id' => $id],
            ['nombre' => 'APROBACION DE PISCINAS', 'abrev' => 'A.PIS', 'licencia_id' => $id],
            ['nombre' => 'APROBACION DE PROYECTO URBANISTICO', 'abrev' => 'A.URB', 'licencia_id' => $id],
            ['nombre' => 'CONCEPTO DE NORMAS URBANAS', 'abrev' => 'C.NOR', 'licencia_id' => $id],
            ['nombre' => 'COPIA CERTIFICADA DE PLANOS', 'abrev' => 'C.PLA', 'licencia_id' => $id],
            ['nombre' => 'CONCEPTO DE USO', 'abrev' => 'C.USO', 'licencia_id' => $id],
            ['nombre' => 'MODIFICACION DE PLANOS URBANISTICOS', 'abrev' => 'M.PLA', 'licencia_id' => $id],
            ['nombre' => 'AUTORIZACION PARA EL MOVIMIENTO DE TIERRAS', 'abrev' => 'MOV.T', 'licencia_id' => $id],
            ['nombre' => 'APROBACION DE PLANOS DE PROPIEDAD HORIZONTAL', 'abrev' => 'APH', 'licencia_id' => $id],
        ]);
    }
}
