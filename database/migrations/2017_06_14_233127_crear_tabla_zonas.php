<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrearTablaZonas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    
    public function up()
    {
        Schema::create('zonas', function (Blueprint $table) {
            $table->increments('id');
            $table->string('cCodZona',12);
            $table->string('cNomZona',100);
            $table->integer('nCodigoCiudad')->default(0);
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
        Schema::drop('zonas');
    }
}
