<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class EncuestaGlobalContestada extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('encuesta_global_contestada', function (Blueprint $table) {
            $table->increments('id_gcon');
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
        Schema::dropIfExists('encuesta_global_contestada');
    }
}
