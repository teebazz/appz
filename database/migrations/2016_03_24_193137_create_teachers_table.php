<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTeachersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('teachers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('firstname');
            $table->string('lastname');
            $table->string('othername');
            $table->string('photo');
            $table->string("gender");
            $table->string("birthdate");
            $table->string("address");
            $table->string("city")->nullable();
            $table->string("phone")->nullable();
            $table->string("email")->nullable();
            $table->string("religion")->nullable();
            $table->string("blood_group")->nullable();
            $table->string("password");
            $table->string("status");
            $table->timestamps();
            $table->integer('state_id')->unsigned();
            $table->foreign('state_id')->references('id')->on('states');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('teachers');
    }
}
