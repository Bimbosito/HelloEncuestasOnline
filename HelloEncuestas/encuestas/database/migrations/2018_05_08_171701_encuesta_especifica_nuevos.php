<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class EncuestaEspecificaNuevos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('encuesta_especifica', function($table){
            $table->integer('id_glo')->unsigned()->nullable();
            $table->foreign('id_glo')->references('id_glo')->on('encuesta_global');
            $table->integer('id_usu')->unsigned();
            //$table->integer('id_glo')->unsigned();
            $table->foreign('id_usu')->references('id_usu')->on('usuarios');
        });


    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
