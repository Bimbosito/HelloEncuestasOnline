<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Campania extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('campania', function(Blueprint $table){
            $table->increments('id_cam');
            $table->string('nombre');
            $table->string('privacidad');
            $table->string('sede');
            $table->string('ciudad');
            $table->string('evento');
            $table->integer('id_usu')->unsigned();
            $table->foreign('id_usu')->references('id_usu')->on('usuarios');
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
        Schema::dropIfExists('campania');
    }
}
