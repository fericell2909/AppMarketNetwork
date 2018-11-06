<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrearTablaOrdenesDetalles extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ordenes_detalles', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('orden_id');
            $table->foreign('orden_id')->references('id')->on('ordenes');
            $table->double('precio', 5, 2);
            $table->integer('cantidad')->unsigned();
            $table->double('subtotal', 5, 2);
            $table->unsignedInteger('ofertas_id');
            $table->foreign('ofertas_id')->references('id')->on('ofertas');
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
        Schema::drop('ordenes_detalles');
    }
}
