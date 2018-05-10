<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class OpcionMultipleGlobal extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('opcion_multiple_global', function (Blueprint $table) {
            $table->increments('id_rgl');
            $table->text('respuestas');
            $table->integer('id_pglo')->unsigned();
            $table->timestamps();
           $table->foreign('id_pglo')->references('id_pglo')->on('preguntas_global');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('opcion_multiple_global');
    }
}
