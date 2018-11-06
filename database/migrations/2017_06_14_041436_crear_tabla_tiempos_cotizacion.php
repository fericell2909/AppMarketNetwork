<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrearTablaTiemposCotizacion extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tiempos_cotizacion', function (Blueprint $table) {
            $table->increments('id');
            $table->string('tiempo_cotizacion',60);
            $table->integer('nEstado');
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
        Schema::drop('tiempos_cotizacion');
    }
}
