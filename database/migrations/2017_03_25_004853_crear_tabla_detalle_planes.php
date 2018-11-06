<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrearTablaDetallePlanes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detalleplanes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('descripcion_detalle_planes',100)->notNullable();
            $table->integer('nEstado')->notNullable();
            $table->integer('nCheckPlan')->notNullable();
            $table->unsignedInteger('plan_id')->notNullable();
            $table->foreign('plan_id')->references('id')->on('planes');
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
        Schema::drop('detalleplanes');
    }
}
