<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DetalleCampania extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detalle_campania', function(Blueprint $table){
            $table->increments('id_dcam');
            $table->integer('id_cam')->unsigned();
            $table->integer('id_mar')->unsigned();
            $table->foreign('id_cam')->references('id_cam')->on('campania');
            $table->foreign('id_mar')->references('id_mar')->on('marca');
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
        Schema::dropIfExists('detalle_campania');
    }
}
