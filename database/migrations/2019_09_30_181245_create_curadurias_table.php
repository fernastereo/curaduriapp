<?php

use App\Curaduria;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCuraduriasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('curadurias', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('ciudad_id');
            $table->string('numero');
            $table->string('curador');
            $table->string('idcurador');
            $table->string('direccion');
            $table->string('telefono');
            $table->string('email');
            $table->string('web')->nullable();
            $table->string('logo')->nullable();
            $table->string('emailsolicitudes');
            $table->string('responsesolicitudes');
            $table->dateTime('fechaini');
            $table->integer('estado')->default(Curaduria::CURADURIA_INACTIVA);
            $table->string('bucket')->nullable();
            $table->timestamps();

            $table->foreign('ciudad_id')->references('id')->on('ciudads');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('curadurias');
    }
}
