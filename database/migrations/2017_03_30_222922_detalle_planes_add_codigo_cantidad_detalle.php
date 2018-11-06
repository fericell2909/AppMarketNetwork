<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DetallePlanesAddCodigoCantidadDetalle extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('detalleplanes', function(Blueprint $table)
    {
         $table->unsignedInteger('codigo_detalle')->default(1);
         $table->unsignedInteger('cantidad_grupo_detalle')->default(8);
    });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
     Schema::table('users', function(Blueprint $table)
    {
        $table->dropColumn('codigo_detalle');
        $table->dropColumn('cantidad_grupo_detalle');
    });
    }
}
