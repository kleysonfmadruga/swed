<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCitiesTable extends Migration
{
    public function up()
    {
        Schema::create('cities', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('state_id')->unsigned();
            $table->integer('code');
            $table->string('name');

            $table->timestampsTz();
        });

        Schema::table('cities', function (Blueprint $table){
            $table->foreign('state_id')->references('id')->on('states');
        });
    }

    public function down()
    {
        Schema::table('cities', function (Blueprint $table){
            $table->dropForeign(['state_id']);
        });

        Schema::dropIfExists('cities');
    }
}
