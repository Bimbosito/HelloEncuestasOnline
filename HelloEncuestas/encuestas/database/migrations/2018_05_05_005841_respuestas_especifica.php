<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RespuestasEspecifica extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('respuestas_especifica', function (Blueprint $table) {
            $table->increments('id_resp');
            $table->text('respuesta');
            $table->integer('id_pesp')->unsigned();
            $table->integer('id_econ')->unsigned();
            $table->timestamps();
          $table->foreign('id_pesp')->references('id_pesp')->on('preguntas_especifica');
         $table->foreign('id_econ')->references('id_econ')->on('encuesta_especifica_contestada');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('respuestas_especifica');
    }
}
