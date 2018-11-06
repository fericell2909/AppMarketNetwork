<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('Nombres',100);
            $table->string('Apellidos',150);
            $table->string('email')->unique();
            $table->string('password');
            $table->unsignedInteger('departamento_id');
            $table->foreign('departamento_id')->references('id')->on('departamentos');
            $table->unsignedInteger('distrito_id');
            $table->foreign('distrito_id')->references('id')->on('distritos');
            $table->rememberToken();
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
        Schema::drop('users');
    }
}
