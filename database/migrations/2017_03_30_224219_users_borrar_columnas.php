<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UsersBorrarColumnas extends Migration
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
        $table->dropColumn('codigo_detalle');
        $table->dropColumn('cantidad_grupo_detalle');
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
