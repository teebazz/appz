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
            $table->string('firstname');
            $table->string('lastname');
            $table->string('othername')->nullable();
            $table->string('image')->nullable();
            $table->string("gender");
            $table->string("birthdate")->nullable();
            $table->string("address");
            $table->string("city")->nullable();
            $table->string("phone")->nullable();
            $table->string("email")->nullable();
            $table->string("religion")->nullable();
            $table->string("blood_group")->nullable();
            $table->string("password");
            $table->string("status");
            $table->integer('state_id')->unsigned();
            $table->foreign('state_id')->references('id')->on('states');
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
