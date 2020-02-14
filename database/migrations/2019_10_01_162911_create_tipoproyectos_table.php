<?php

use App\Tipoproyecto;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTipoproyectosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tipoproyectos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nombre');
            $table->integer('estado')->default(Tipoproyecto::TIPOPROYECTO_ACTIVO);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tipoproyectos');
    }
}
