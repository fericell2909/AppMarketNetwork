<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrearTablaOfertas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ofertas', function (Blueprint $table) {
            $table->increments('id');
            $table->string('titulo_oferta',100);
            $table->double('precio_oferta', 8, 2);
            $table->double('precio_real', 8, 2);
            $table->double('descuento', 8, 2);
            $table->date('fecha_inicio');
            $table->date('fecha_termino');
            $table->string('ruta_imagen_oferta',50);
            $table->string('calificacion_oferta',10);
            $table->unsignedInteger('total_comentarios');
            $table->string('prov_razon_social',100);
            $table->unsignedInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->unsignedInteger('nEstado_Oferta');
            $table->foreign('nEstado_Oferta')->references('id')->on('estados_ofertas');
            $table->unsignedInteger('nTipo_Oferta');
            $table->foreign('nTipo_Oferta')->references('id')->on('tipos_ofertas');
            $table->integer('nEstado');
            $table->unsignedInteger('categoria_id');
            $table->foreign('categoria_id')->references('id')->on('categorias');
            $table->unsignedInteger('servicio_id');
            $table->foreign('servicio_id')->references('id')->on('servicios');

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
        Schema::drop('ofertas');
    }
}
