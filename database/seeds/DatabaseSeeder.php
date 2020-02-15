<?php

use App\User;
use App\Ciudad;
use App\Curaduria;
use App\Expediente;
use App\Departamento;
use App\Tipoproyecto;
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
        //DB::table('tabla')->truncate(); //Para tablas pivote que no tienen modelo asociado (muchos-muchos)

        $this->call([
            CiudadsTableSeeder::class,
            EstadoexpedientesTableSeeder::class,
            ObjetolicenciasTableSeeder::class,
            TipoproyectoTableSeeder::class
        ]);

        //Aqui llamar el factory de Curadurias, en este se crean curadurias y usuarios por cada una
        /*
        Ejecuto el factory Curaduria 10 veces con create y por cada uno de los registros creados 
        mando una funcion anonima (callback) a la que le mando como parametro cada uno de los 
        registros curaduria ($curaduria) que se van creando (para esto es el each) y dentro de esa 
        funcion ejecuto el factory User, x veces con create y al create le mando en un array la 
        relacion entre las dos tablas asignandole al campo relacion la variable que envié como 
        parametro en el callback
        */
        factory(Curaduria::class, 20)->create()->each(function($curaduria){
            factory(User::class, mt_rand(1, 10))->create([
                'curaduria_id' => $curaduria->id,
            ]);
        });
    }
}
