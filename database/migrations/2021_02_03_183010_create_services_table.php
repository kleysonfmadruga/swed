<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServicesTable extends Migration
{
    
    public function up()
    {
        Schema::create('services', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->double('price', 10, 2);
            $table->bigInteger('establishment_id')->unsigned();

        });
        Schema::table('services', function (Blueprint $table){
            $table->foreign('establishment_id')->references('id')->on('establishments');
        });
    }

    public function down()
    {
        Schema::table('services', function (Blueprint $table){
            $table->dropForeign(['establishment_id']);
        });
        Schema::dropIfExists('services');
    }
}
