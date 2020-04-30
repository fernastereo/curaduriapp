<?php

use App\User;
use App\Ciudad;
use App\Curaduria;
use App\Solicitud;
use App\Expediente;
use App\Solicitante;
use App\Departamento;
use App\Tipoproyecto;
use App\Anexosolicitud;
use App\Objetolicencia;
use App\Estadoexpediente;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        //Desactivar la verificacion de llaves foraneas
        DB::statement('SET FOREIGN_KEY_CHECKS = 0');
        
        //Borra todos los datos de la BD
        User::truncate();
        Ciudad::truncate();
        Curaduria::truncate();
        Departamento::truncate();
        Estadoexpediente::truncate();
        Expediente::truncate();;
        Objetolicencia::truncate();
        Tipoproyecto::truncate();
        Solicitante::truncate();
        Solicitud::truncate();
        Anexosolicitud::truncate();
        //DB::table('tabla')->truncate(); //Para tablas pivote que no tienen modelo asociado (muchos-muchos)

        $this->call([
            CiudadsTableSeeder::class,
            EstadoexpedientesTableSeeder::class,
            ObjetolicenciasTableSeeder::class,
            TipoproyectoTableSeeder::class,
            CuraduriaTableSeeder::class,
            LicenciasTableSeeder::class,
            SolicitanteTableSeeder::class,
            SolicitudTableSeeder::class,
            AnexosolicitudTableSeeder::class
        ]);
    }
}
