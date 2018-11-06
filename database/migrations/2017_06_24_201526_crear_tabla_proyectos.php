<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrearTablaProyectos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('proyectos', function (Blueprint $table) {
            $table->increments('id');

            $table->string('titulo_proyecto',100);
            $table->unsignedInteger('mes_id');
            $table->foreign('mes_id')->references('id')->on('meses');
            $table->unsignedInteger('anio_id');
            $table->foreign('anio_id')->references('id')->on('anios');
            $table->double('costo_proyecto', 15, 2)->default(0);
            $table->unsignedInteger('moneda_id');
            $table->foreign('moneda_id')->references('id')->on('monedas');
            $table->longText('descripcion_proyecto');
            $table->unsignedInteger('proyecto_id_departamento');
            $table->foreign('proyecto_id_departamento')->references('id')->on('zonas');
            $table->unsignedInteger('proyecto_id_provincia');
            $table->foreign('proyecto_id_provincia')->references('id')->on('zonas');
            $table->unsignedInteger('proyecto_id_distrito');
            $table->foreign('proyecto_id_distrito')->references('id')->on('zonas');
            $table->string('direccion_proyecto',100);
            $table->double('latitud', 15, 8)->default(0);
            $table->double('longitud', 15, 8)->default(0);
            $table->unsignedInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->unsignedInteger('estado_proyecto_id');
            $table->foreign('estado_proyecto_id')->references('id')->on('estados_proyectos');
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
        Schema::drop('proyectos');
    }
}
