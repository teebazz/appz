<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateParentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('parents', function (Blueprint $table) {
            $table->increments('id');
            $table->string("name");
            $table->string("address");
            $table->string("city")->nullable();
            $table->string("phone")->nullable();
            $table->string("email")->nullable();
            $table->string("religion")->nullable();
            $table->string("profession")->nullable();
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
        Schema::drop('parents');
    }
}
