<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrearTablaDebitaciones extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('debitaciones', function (Blueprint $table) {
            $table->increments('id');
            $table->string('descripcion_debitacion',60);
            $table->integer('meses')->notNullable();
            $table->integer('nEstado')->notNullable();
            $table->unsignedInteger('moneda_id');
            $table->foreign('moneda_id')->references('id')->on('monedas');
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
        Schema::drop('debitaciones');
    }
}
