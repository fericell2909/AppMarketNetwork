<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrearTablaTmpEncuestasPendientes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('tmp_encuestas_pendientes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('Correo_Administrador',60);
            $table->string('Nombre_Administrador',60);
            $table->string('Correo_Usuario_Registro',60);
            $table->string('Nombre_Usuario_Registro',60);
            $table->string('Apellidos_Usuario_Registro',100);
            $table->string('prov_razon_social',100);
            $table->string('titulo_mensaje',100);
            $table->string('link_encuesta',100);
            $table->unsignedInteger('users_id');
            $table->foreign('users_id')->references('id')->on('users');
            $table->unsignedInteger('oferta_id');
            $table->foreign('oferta_id')->references('id')->on('ofertas');
            $table->unsignedInteger('ordenes_detalles_id');
            $table->foreign('ordenes_detalles_id')->references('id')->on('ordenes_detalles');
            $table->integer('nRealizoEncuesta')->default(0);
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
        Schema::drop('tmp_encuestas_pendientes');
    }
}
