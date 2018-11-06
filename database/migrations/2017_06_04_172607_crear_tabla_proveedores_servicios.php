<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrearTablaProveedoresServicios extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('proveedores_servicios', function (Blueprint $table) {
            $table->increments('id');
             $table->unsignedInteger('users_id');
            $table->foreign('users_id')->references('id')->on('users');
            $table->unsignedInteger('servicios_id');
            $table->foreign('servicios_id')->references('id')->on('servicios');
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
        Schema::drop('proveedores_servicios');
    }
}
