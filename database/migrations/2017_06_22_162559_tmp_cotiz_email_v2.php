<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TmpCotizEmailV2 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
               Schema::create('tmp_cotizaciones_correos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('Correo_Administrador',60);
            $table->string('Nombre_Administrador',60);
            $table->string('Correo_Usuario_Registro',60);
            $table->string('Nombre_Usuario_Registro',60);
            $table->string('Apellidos_Usuario_Registro',100);
            $table->longText('descripcion_cotizacion');
            $table->string('Servicio',100);
            $table->string('Tiempo',100);
            $table->string('nombre_contacto_cotizacion',100);
            $table->string('apellido_contacto_cotizacion',100);
            $table->string('celular_contacto_cotizacion',100);
            $table->string('email_contacto_cotizacion',50);
            $table->string('contacto_departamento',100);
            $table->string('contacto_provincia',100);
            $table->string('contacto_distrito',100);
            $table->string('direccion_cotizacion',100);
            $table->integer('nEnvioCotizacion')->default(0);
             $table->unsignedInteger('cotizacion_id');
            $table->foreign('cotizacion_id')->references('id')->on('cotizaciones');
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
        //
    }
}
