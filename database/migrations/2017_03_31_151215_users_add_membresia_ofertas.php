<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UsersAddMembresiaOfertas extends Migration
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
            $table->integer('bMembresia')->default(1);
            $table->integer('bOfertas')->default(1);
        });
    }   


    /**
     * Reverse the migrations.
     *
     * @return void
     */

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
