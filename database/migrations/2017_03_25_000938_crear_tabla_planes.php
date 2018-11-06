<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrearTablaPlanes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('planes', function (Blueprint $table) {
             $table->increments('id');
            $table->string('descripcion_plan',60)->notNullable();
            $table->integer('nEstado')->notNullable();
            $table->unsignedInteger('debitacion_id')->notNullable();
            $table->foreign('debitacion_id')->references('id')->on('debitaciones');
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
        Schema::drop('planes');
    }
}
