<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class EncuestaGlobalCampania extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('encuesta_global_campania', function(Blueprint $table){
            $table->increments('id_glca');
            $table->integer('id_glo')->unsigned();
            $table->integer('id_cam')->unsigned();
            $table->foreign('id_glo')->references('id_glo')->on('encuesta_global');
            $table->foreign('id_cam')->references('id_cam')->on('campania');
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
        Schema::dropIfExists('encuesta_global_campania');
    }
}
