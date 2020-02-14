<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        $this->call(CiudadsTableSeeder::class);
        $this->call(EstadoexpedientesTableSeeder::class);
        $this->call(ObjetolicenciasTableSeeder::class);
        $this->call(TipoproyectoTableSeeder::class);
    }
}
