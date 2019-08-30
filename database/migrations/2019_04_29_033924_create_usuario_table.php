<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsuarioTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('usuario', function (Blueprint $table) {
            $table->increments('idUsuario');
            $table->string('nombreUsuario', 45);
            $table->string('APAUsuario', 45);
            $table->string('AMAUsuario', 45);
            $table->string('correoUsuario', 45);
            $table->string('nicknameUsuario', 45);
            $table->string('Sexo', 45);
            $table->string('contrasenaUsuario', 45);
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
        Schema::dropIfExists('usuario');
    }
}
