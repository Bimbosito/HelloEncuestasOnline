<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Usuarios extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('usuarios', function(Blueprint $table){
            $table->increments('id_usu');
            $table->string('nombre');
            $table->string('email');
            $table->string('contrasena');
            $table->string('empresa');
            $table->string('logo')->nullable();
            $table->integer('id_paq')->unsigned();
            $table->foreign('id_paq')->references('id_paq')->on('paquetes');
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
        //Schema::dropIfExists('usuarios');
    }
}
