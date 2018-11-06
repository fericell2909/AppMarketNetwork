<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrearTablaOfertasPrivadas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ofertas_privadas', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('ofertas_id');
            $table->foreign('ofertas_id')->references('id')->on('ofertas');
            $table->unsignedInteger('users_id');
            $table->foreign('users_id')->references('id')->on('users');
            $table->unsignedInteger('cotizaciones_id');
            $table->foreign('cotizaciones_id')->references('id')->on('cotizaciones');
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
        Schema::drop('ofertas_privadas');
    }
}
