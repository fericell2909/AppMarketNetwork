<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrearTablaOfertasComentariosEncuesta extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ofertas_comentarios_encuesta', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('users_id');
            $table->foreign('users_id')->references('id')->on('users');
            $table->string('Nombres',100);
            $table->string('Apellidos',150);
            $table->string('email',255);
            $table->unsignedInteger('oferta_id');
            $table->foreign('oferta_id')->references('id')->on('ofertas');
            $table->string('titulo_oferta',100);
            $table->unsignedInteger('proveedor_id');
            $table->foreign('proveedor_id')->references('id')->on('users');
            $table->string('prov_razon_social',100);
            $table->longText('descripcion_comentario');
            $table->date('fecha_encuesta')->default('2017-01-01');
            $table->unsignedInteger('puntaje');
            $table->double('promedio', 8, 2);
            $table->string('calificacionestrella',10);
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
        Schema::drop('ofertas_comentarios_encuesta');
    }
}
