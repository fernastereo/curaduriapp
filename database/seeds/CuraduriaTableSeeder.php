<?php

use App\User;
use App\Curaduria;
use Illuminate\Database\Seeder;

class CuraduriaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
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
