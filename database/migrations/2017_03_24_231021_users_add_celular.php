<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UsersAddCelular extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
   public function up()
{
    // Crear un campo nuevo para el teléfono
    Schema::table('users', function(Blueprint $table)
    {
        $table->string('celular',35);
    });
}

public function down()
{
    // Borrar el nuevo campo creado
    Schema::table('users', function(Blueprint $table)
    {
        
    });
}
}
