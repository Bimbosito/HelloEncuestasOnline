<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RespuestasGlobal extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('respuestas_global', function (Blueprint $table) {
            $table->increments('id_rglo');
            $table->text('respuesta');
            $table->integer('id_pglo')->unsigned();
            $table->integer('id_gcon')->unsigned();
            $table->timestamps();
          $table->foreign('id_pglo')->references('id_pglo')->on('preguntas_global');
         $table->foreign('id_gcon')->references('id_gcon')->on('encuesta_global_contestada');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('respuestas_global');
    }
}
