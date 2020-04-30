<?php

use App\Solicitudanexo;
use Illuminate\Database\Seeder;

class SolicitudanexoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Solicitudanexo::class, 15)->create();
    }
}
