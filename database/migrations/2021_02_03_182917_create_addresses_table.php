<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAddressesTable extends Migration
{
    public function up()
    {
        Schema::create('addresses', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('state_id')->unsigned();
            $table->bigInteger('city_id')->unsigned();
            $table->string('neighborhood');
            $table->string('street');
        });

        Schema::table('addresses', function (Blueprint $table){
            $table->foreign('state_id')->references('id')->on('states');
        });

        Schema::table('addresses', function (Blueprint $table){
            $table->foreign('city_id')->references('id')->on('cities');
        });

    }

    public function down()
    {
        Schema::table('addresses', function (Blueprint $table){
            $table->dropForeign(['state_id']);
        });

        Schema::table('addresses', function (Blueprint $table){
            $table->dropForeign(['city_id']);
        });

        Schema::dropIfExists('addresses');
    }
}
