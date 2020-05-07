<?php

use App\User;
use App\Curaduria;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

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
        // factory(Curaduria::class, 8)->create()->each(function($curaduria){
        //     factory(User::class, mt_rand(1, 3))->create([
        //         'curaduria_id' => $curaduria->id,
        //     ]);
        // });

        //Crear cada una de las curadurias
        DB::table('curadurias')->insert([
            'ciudad_id' => 126,
            'numero' => '0',
            'curador' => 'FERNANDO E. CUETO RIVERA',
            'idcurador' => '12345678',
            'direccion' => 'CRA 49C N° 75 - 47',
            'telefono' => '12345678',
            'email' => 'hey@fernandocueto.com',
            'web' => 'www.fernandocueto.com',
            'logo' => 'css.jpg',
            'fechaini' => '2020-04-28',
            'estado' => Curaduria::CURADURIA_ACTIVA,
            'emailsolicitudes' => 'hey@fernandocueto.com',
            'responsesolicitudes' => 'solicitudrecibida.html',
            'bucket' => '1bq'
            ]);
            
        DB::table('curadurias')->insert([
            'ciudad_id' => 126,
            'numero' => '1',
            'curador' => 'JAIME FONTANILLA MARTINEZ',
            'idcurador' => '12345678',
            'direccion' => 'CRA 58 N° 64-100',
            'telefono' => '12345678',
            'email' => 'info@curaduria1bq.com',
            'web' => 'www.curaduria1bq.com',
            'logo' => '1bq.jpg',
            'fechaini' => '2020-04-28',
            'estado' => Curaduria::CURADURIA_ACTIVA,
            'emailsolicitudes' => 'fernandoecueto@gmail.com',
            'responsesolicitudes' => 'solicitudrecibida.html',
            'bucket' => '1bq'
            ]);

        DB::table('curadurias')->insert([
            'ciudad_id' => 126,
            'numero' => '2',
            'curador' => 'MARTHA HELENA HERRERA CEBALLO',
            'idcurador' => '12345678',
            'direccion' => 'CRA 59 N° 74-12',
            'telefono' => '12345678',
            'email' => 'info@curaduria2barranquilla.com',
            'web' => 'www.curaduria2barranquilla.com',
            'logo' => '2bq.jpg',
            'fechaini' => '2020-04-28',
            'estado' => Curaduria::CURADURIA_ACTIVA,
            'emailsolicitudes' => 'fernandoecueto@gmail.com',
            'responsesolicitudes' => 'solicitudrecibida.html',
            'bucket' => '2bq'
        ]);

        DB::table('curadurias')->insert([
            'ciudad_id' => 150,
            'numero' => '1',
            'curador' => 'RONALD LLAMAS BUSTOS',
            'idcurador' => '12345678',
            'direccion' => 'Centro Histórico',
            'telefono' => '12345678',
            'email' => 'informacion@curaduria1cartagena.com',
            'web' => 'www.curaduria1cartagena.com',
            'logo' => '1ca.jpg',
            'fechaini' => '2020-04-28',
            'estado' => Curaduria::CURADURIA_ACTIVA,
            'emailsolicitudes' => 'fernandoecueto@gmail.com',
            'responsesolicitudes' => 'solicitudrecibida.html',
            'bucket' => '1ca'
        ]);

        DB::table('curadurias')->insert([
            'ciudad_id' => 150,
            'numero' => '2',
            'curador' => 'GUILLERMO MENDOZA JIMENEZ',
            'idcurador' => '12345678',
            'direccion' => 'Centro Calle del Candilejo',
            'telefono' => '12345678',
            'email' => 'info@curaduria2cartagena.com',
            'web' => 'www.curaduria2cartagena.com',
            'logo' => '2ca.jpg',
            'fechaini' => '2020-04-28',
            'estado' => Curaduria::CURADURIA_ACTIVA,
            'emailsolicitudes' => 'fernandoecueto@gmail.com',
            'responsesolicitudes' => 'solicitudrecibida.html',
            'bucket' => '2ca'
        ]);

        DB::table('curadurias')->insert([
            'ciudad_id' => 654,
            'numero' => '1',
            'curador' => 'JORGE TAMAYO CALLEJAS',
            'idcurador' => '12345678',
            'direccion' => 'Cra 18 N° 22 -73',
            'telefono' => '12345678',
            'email' => 'curaduriaurbana1sm@gmail.com',
            'web' => 'www.curaduria1santamarta.co',
            'logo' => '1sm.jpg',
            'fechaini' => '2020-04-28',
            'estado' => Curaduria::CURADURIA_ACTIVA,
            'emailsolicitudes' => 'fernandoecueto@gmail.com',
            'responsesolicitudes' => 'solicitudrecibida.html',
            'bucket' => '1sm'
        ]);

        DB::table('curadurias')->insert([
            'ciudad_id' => 402,
            'numero' => '2',
            'curador' => 'ARYANNA ZULETA OÑATE',
            'idcurador' => '12345678',
            'direccion' => 'Calle 16 N° 6 - 34',
            'telefono' => '12345678',
            'email' => 'curadurianumero2@hotmail.es',
            'web' => 'www.curaduria2valledupar.co',
            'logo' => '2va.jpg',
            'fechaini' => '2020-04-28',
            'estado' => Curaduria::CURADURIA_ACTIVA,
            'emailsolicitudes' => 'fernandoecueto@gmail.com',
            'responsesolicitudes' => 'solicitudrecibida.html',
            'bucket' => '2va'
        ]);

        DB::table('curadurias')->insert([
            'ciudad_id' => 145,
            'numero' => '1',
            'curador' => 'ROSARIO ROJAS',
            'idcurador' => '12345678',
            'direccion' => 'Calle 16 N° 18 - 17',
            'telefono' => '12345678',
            'email' => 'info@curaduria2soledad.com',
            'web' => 'www.curaduria2soledad.com',
            'logo' => '1so.jpg',
            'fechaini' => '2020-04-28',
            'estado' => Curaduria::CURADURIA_ACTIVA,
            'emailsolicitudes' => 'fernandoecueto@gmail.com',
            'responsesolicitudes' => 'solicitudrecibida.html',
            'bucket' => '1so'
        ]);
    }
}
