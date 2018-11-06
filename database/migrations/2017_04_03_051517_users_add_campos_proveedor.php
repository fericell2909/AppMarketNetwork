<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UsersAddCamposProveedor extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
   public function up()
    {
         Schema::table('users', function(Blueprint $table)
    {
         $table->string('prov_ruc',50);
         $table->string('prov_razon_social',100);
         $table->string('prov_direccion',100);
         $table->string('prov_telefono',50);
         $table->string('prov_celular',50);
         $table->longText('prov_descripcion');
         $table->string('prov_pagina_web',50);
    });
}

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
    }
}