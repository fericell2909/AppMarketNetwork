<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrearTablaOfertasDetalles extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ofertas_detalles', function (Blueprint $table) {
            $table->increments('id');
            $table->longText('descripcion_detalle');
            $table->unsignedInteger('ofertas_id');
            $table->foreign('ofertas_id')->references('id')->on('ofertas');
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
        Schema::drop('ofertas_detalles');
    }
}
