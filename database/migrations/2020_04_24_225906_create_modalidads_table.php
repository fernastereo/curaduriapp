<?php

use App\Modalidad;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateModalidadsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('modalidads', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nombre');
            $table->string('abrev');
            $table->integer('estado')->default(Modalidad::MODALIDAD_ACTIVO);
            $table->unsignedBigInteger('licencia_id');
            $table->timestamps();
            $table->foreign('licencia_id')->references('id')->on('licencias');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('modalidads');
    }
}
