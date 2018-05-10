<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class EncuestaEspecificaCampania extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('encuesta_especifica_campania', function(Blueprint $table){
            $table->increments('id_esca');
            $table->integer('id_esp')->unsigned();
            $table->integer('id_cam')->unsigned();
            $table->foreign('id_esp')->references('id_esp')->on('encuesta_especifica');
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
        Schema::dropIfExists('encuesta_especifica_campania');
    }
}
