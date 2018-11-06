<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrearTablaEncuestaPreguntasOpciones extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
   public function up()
    {
        Schema::create('encuesta_preguntas_opciones', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('pregunta_id');
            $table->foreign('pregunta_id')->references('id')->on('encuesta_preguntas');
            $table->unsignedInteger('CodigoOpcion');
            $table->string('titulo_opcion',100);
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
        Schema::drop('encuesta_preguntas_opciones');
    }
}