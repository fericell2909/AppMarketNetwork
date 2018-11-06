<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UsersAddCarritoCompra extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
     public function up()
    {
         Schema::table('users', function (Blueprint $table) {
            $table->integer('nTotalItemCarritoCompra')->default(0);
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
