<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class EncuestaEspecifica extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('encuesta_especifica', function (Blueprint $table) {
            $table->increments('id_esp');
            $table->string('nombre');
            $table->date('fecha_inicio');
            $table->date('fecha_fin');
            $table->string('sede');
            $table->integer('marca');
            $table->string('evento');
            $table->tinyInteger('abierto');
            $table->tinyInteger('borrado');
            //$table->integer('id_usu')->unsigned();
            //$table->integer('id_glo')->unsigned();
            //$table->foreign('id_usu')->references('id_usu')->on('usuarios');
            //$table->foreign('id_glo')->references('id_glo')->on('encuesta_global');
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
        Schema::dropIfExists('encuesta_especifica');
    }
}
