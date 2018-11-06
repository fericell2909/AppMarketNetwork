<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class EncuestaPreguntasAddBPuntaje extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('encuesta_preguntas', function (Blueprint $table) {
            $table->unsignedInteger('nConsiderarPuntaje')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * 
     */
    public function down()
    {
        //
    }
}
