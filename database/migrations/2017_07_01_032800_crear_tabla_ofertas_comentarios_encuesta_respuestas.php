<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrearTablaOfertasComentariosEncuestaRespuestas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ofertas_comentarios_encuesta_respuestas', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('comentario_id');
            $table->foreign('comentario_id')->references('id')->on('ofertas_comentarios_encuesta');
            $table->unsignedInteger('codigo_pregunta');
            $table->foreign('codigo_pregunta')->references('id')->on('encuesta_preguntas');
            $table->unsignedInteger('codigo_respuesta');
            $table->foreign('codigo_respuesta')->references('id')->on('encuesta_preguntas_opciones');
            $table->unsignedInteger('puntaje_pregunta');
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
        Schema::drop('ofertas_comentarios_encuesta_respuestas');
    }
}
