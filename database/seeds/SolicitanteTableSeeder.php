<?php

use App\Solicitante;
use Illuminate\Database\Seeder;

class SolicitanteTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Solicitante::class, 20)->create();
    }
}
