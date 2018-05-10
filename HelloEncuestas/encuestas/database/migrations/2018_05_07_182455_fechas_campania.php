<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class FechasCampania extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fechas_campania', function(Blueprint $table){
            $table->increments('id_fcam');
            $table->integer('id_fech')->unsigned();
            $table->integer('id_cam')->unsigned();
            $table->foreign('id_fech')->references('id_fech')->on('fechas');
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
        Schema::dropIfExists('fechas_campania');
    }
}
