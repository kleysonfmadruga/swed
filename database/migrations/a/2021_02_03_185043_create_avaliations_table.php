<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAvaliationsTable extends Migration
{
    public function up()
    {
        Schema::create('avaliations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('grade');
            $table->string('comment');
            $table->bigInteger('establishment_id')->unsigned();
            $table->bigInteger('user_id')->unsigned();
            $table->timestamps();
        });

        Schema::table('avaliations', function (Blueprint $table){
            $table->foreign('establishment_id')->references('id')->on('establishments');
        });

        Schema::table('avaliations', function (Blueprint $table){
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    public function down()
    {
        Schema::table('avaliations', function (Blueprint $table){
            $table->dropForeign(['establishment_id']);
        });

        Schema::table('avaliations', function (Blueprint $table){
            $table->dropForeign(['user_id']);
        });

        Schema::dropIfExists('avaliations');
    }
}
