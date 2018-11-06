<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrearTablaProyectosImagenes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Proyecto_Imagenes', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('proyecto_id');
            $table->foreign('proyecto_id')->references('id')->on('proyectos');
            $table->string('cRutaImagenProyecto',60);
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
        Schema::drop('Proyecto_Imagenes');
    }
}
