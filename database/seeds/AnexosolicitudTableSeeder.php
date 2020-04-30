<?php

use App\Anexosolicitud;
use Illuminate\Database\Seeder;

class AnexosolicitudTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Anexosolicitud::class, 15)->create();
    }
}
