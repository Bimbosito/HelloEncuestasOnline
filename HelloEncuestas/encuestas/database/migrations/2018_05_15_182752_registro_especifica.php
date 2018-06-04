<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RegistroEspecifica extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('registro_especifica', function (Blueprint $table) {
            $table->increments('id_regesp');
            $table->text('campo');
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
        Schema::dropIfExists('registro_especifica');
    }
}
