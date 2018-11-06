<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class OrdenesDetallesModifyPrecio extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       DB::statement('ALTER TABLE `ordenes_detalles` MODIFY `precio` DECIMAL(8,2) NOT NULL;');
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
