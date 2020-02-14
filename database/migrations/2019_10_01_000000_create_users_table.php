<?php

use App\User;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->integer('verified')->default(User::USUARIO_NO_VERIFICADO);
            $table->string('verification_token')->nullable();
            $table->unsignedBigInteger('curaduria_id');
            //$table->unsignedBigInteger('profile_id');
            $table->rememberToken();
            $table->timestamps();

            $table->foreign('curaduria_id')->references('id')->on('curadurias');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
