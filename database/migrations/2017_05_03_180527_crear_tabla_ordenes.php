<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrearTablaOrdenes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ordenes', function (Blueprint $table) {
            $table->increments('id');
            $table->double('total', 8, 2);
            $table->unsignedInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->unsignedInteger('nEstado_Orden');
            $table->foreign('nEstado_Orden')->references('id')->on('estados_ordenes');
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
        Schema::drop('ordenes');
    }
}
