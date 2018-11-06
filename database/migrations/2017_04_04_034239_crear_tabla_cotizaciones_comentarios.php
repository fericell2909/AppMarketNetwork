<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrearTablaCotizacionesComentarios extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cotizaciones_comentarios', function (Blueprint $table) {
            $table->increments('id');
            $table->longText('descripcion_comentario');
            $table->dateTime('fecha_registro');
            $table->unsignedInteger('cotizaciones_id');
            $table->foreign('cotizaciones_id')->references('id')->on('cotizaciones');
            $table->unsignedInteger('users_id');
            $table->foreign('users_id')->references('id')->on('users');
            $table->unsignedInteger('users_tipos_id');
            $table->foreign('users_tipos_id')->references('id')->on('users_tipos');
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
        Schema::drop('cotizaciones_comentarios');
    }
}
