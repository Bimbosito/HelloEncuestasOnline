<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class EncuestaEspecificaContestada extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('encuesta_especifica_contestada', function (Blueprint $table) {
            $table->increments('id_econ');
            $table->integer('id_esp')->unsigned();
            $table->timestamps();
            $table->foreign('id_esp')->references('id_esp')->on('encuesta_especifica');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('encuesta_especifica_contestada');
    }
}
