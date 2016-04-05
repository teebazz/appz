<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->increments('id');
            $table->string("app_number");
            $table->string('firstname');
            $table->string('lastname');
            $table->string('othername');
            $table->string('image');
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
            $table->integer('class_id')->unsigned();
            $table->foreign('class_id')->references('id')->on('classes');
            $table->integer('section_id')->unsigned()->nullable();
            $table->foreign('section_id')->references('id')->on('sections');
            $table->integer('parent_id')->unsigned()->nullable();
            $table->foreign('parent_id')->references('id')->on('parents');
            $table->integer('division_id')->unsigned();
            $table->foreign('division_id')->references('id')->on('divisions');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('students');
    }
}
