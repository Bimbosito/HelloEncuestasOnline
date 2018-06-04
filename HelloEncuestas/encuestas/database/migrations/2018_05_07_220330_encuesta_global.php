<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class EncuestaGlobal extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('encuesta_global', function (Blueprint $table) {
            $table->increments('id_glo');
            $table->string('nombre');
            $table->date('fecha_inicio');
            $table->date('fecha_fin');
            $table->string('sede');
            $table->integer('marca');
            $table->string('evento');
            $table->tinyInteger('abierto');
            $table->tinyInteger('borrado');
            $table->integer('id_usu')->unsigned();
            $table->foreign('id_usu')->references('id_usu')->on('usuarios');
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
        //Schema::dropIfExists('encuesta_global');
    }
}
