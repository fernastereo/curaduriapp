<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSolicitudsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('solicituds', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('objetolicencia_id');
            $table->string('licenciaanteriornumero')->nullable();
            $table->string('licenciaanteriorvigencia')->nullable();
            $table->unsignedBigInteger('modalidad_id');
            $table->unsignedBigInteger('solicitante_id');
            $table->text('descripcion')->nullable();
            $table->integer('anexos')->default(0);
            $table->string('token')->nullable();
            $table->timestamps();
            $table->foreign('objetolicencia_id')->references('id')->on('objetolicencias');
            $table->foreign('modalidad_id')->references('id')->on('modalidads');
            $table->foreign('solicitante_id')->references('id')->on('solicitantes');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('solicituds');
    }
}
