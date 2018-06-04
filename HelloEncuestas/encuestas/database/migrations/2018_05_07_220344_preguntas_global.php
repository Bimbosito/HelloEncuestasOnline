<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class PreguntasGlobal extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('preguntas_global', function (Blueprint $table) {
            $table->increments('id_pglo');
            $table->text('pregunta');
            $table->integer('tipo');
            $table->integer('id_glo')->unsigned();
            $table->timestamps();
           $table->foreign('id_glo')->references('id_glo')->on('encuesta_global');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('preguntas_global');
    }
}
