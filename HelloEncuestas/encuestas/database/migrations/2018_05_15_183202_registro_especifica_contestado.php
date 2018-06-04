<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RegistroEspecificaContestado extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('registro_especifica_contestado', function (Blueprint $table) {
            $table->increments('id_regespcon');
            $table->text('texto');
            $table->integer('id_regesp')->unsigned();
            $table->integer('id_econ')->unsigned();
            $table->timestamps();
           $table->foreign('id_regesp')->references('id_regesp')->on('registro_especifica');
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
        Schema::dropIfExists('registro_especifica_contestado');
    }
}
