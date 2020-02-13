<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateExpedientesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('expedientes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('curaduria_id');
            $table->integer('idradicacion');
            $table->dateTime('fecharad');
            $table->string('vigencia');
            $table->unsignedBigInteger('objetolicencia_id');
            $table->unsignedBigInteger('parent_id')->nullable();
            $table->dateTime('fechacompleto');
            $table->string('nombre');
            $table->dateTime('fechacierre');
            $table->unsignedBigInteger('estadoexpediente_id');
            $table->timestamps();
            $table->foreign('curaduria_id')->references('id')->on('curadurias');
            $table->foreign('objetolicencia_id')->references('id')->on('objetolicencias');
            $table->foreign('estadoexpediente_id')->references('id')->on('estadoexpedientes');
            $table->foreign('parent_id')->references('id')->on('expedientes');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('expedientes');
    }
}
