<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class OfertasAddMoneda extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::table('ofertas', function (Blueprint $table) {
            $table->unsignedInteger('monedas_id')->default(1);
            $table->foreign('monedas_id')->references('id')->on('monedas');
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
