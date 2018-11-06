<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Cotizaciones extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('cotizaciones', function (Blueprint $table) {
            $table->increments('id');
            $table->string('titulo_cotizacion',100);
            $table->longText('descripcion_cotizacion');
            $table->double('costo', 8, 2)->default(0);
            $table->unsignedInteger('estado_id');
            $table->foreign('estado_id')->references('id')->on('estadocotizaciones');
            $table->unsignedInteger('categoria_id');
            $table->foreign('categoria_id')->references('id')->on('categorias');
            $table->unsignedInteger('servicio_id');
            $table->foreign('servicio_id')->references('id')->on('servicios');
            $table->unsignedInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->string('fecha_vigencia_maxima',10)->default('31/12/9999');
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
           Schema::drop('cotizaciones');
    }
}
