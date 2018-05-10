<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class OpcionMultipleEspecifica extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('opcion_multiple_especifica', function (Blueprint $table) {
            $table->increments('id_res');
            $table->text('respuestas');
            $table->integer('id_pesp')->unsigned();
            $table->timestamps();
           $table->foreign('id_pesp')->references('id_pesp')->on('preguntas_especifica');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('opcion_multiple_especifica');
    }
}
