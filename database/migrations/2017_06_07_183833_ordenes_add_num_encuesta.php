<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class OrdenesAddNumEncuesta extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('ordenes', function (Blueprint $table) {
            $table->unsignedInteger('CantidadDetalle')->default(0);
            $table->unsignedInteger('nEncuestaPendiente')->default(0);
            $table->unsignedInteger('CantidadEncuestaPendiente')->default(0);
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
