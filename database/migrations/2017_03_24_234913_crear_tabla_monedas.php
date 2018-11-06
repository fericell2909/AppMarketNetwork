<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrearTablaMonedas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
  public function up()
    {
        Schema::create('monedas', function (Blueprint $table) {
            $table->increments('id');
            $table->string('descripcion_moneda',60);
            $table->string('simbolo_moneda',60);
            $table->integer('nEstado');
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
        Schema::drop('monedas');
    }
}
