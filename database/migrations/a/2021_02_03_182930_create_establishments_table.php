<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEstablishmentsTable extends Migration
{
    public function up()
    {
        Schema::create('establishments', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('cnpj')->unique();
            $table->string('name');
            $table->string('openinh_hours');
            $table->string('phone_number');
            $table->string('products');
            $table->string('services');
            $table->bigInteger('addresses_id')->unsigned();
            $table->bigInteger('owner_id')->unsigned();
            $table->bigInteger('category_id')->unsigned();

            $table->timestamps();
        });

        Schema::table('establishments', function (Blueprint $table){
            $table->foreign('addresses_id')->references('id')->on('addresses');
        });

        Schema::table('establishments', function (Blueprint $table){
            $table->foreign('owner_id')->references('id')->on('owners')->onDelete('cascade')->onUptade('cascade');
        });

        Schema::table('establishments', function (Blueprint $table){
            $table->foreign('category_id')->references('id')->on('categories');
        });

    }

    public function down()
    {
        Schema::table('establishments', function (Blueprint $table){
            $table->dropForeign(['addresses_id']);
        });
        Schema::table('establishments', function (Blueprint $table){
            $table->dropForeign(['owner_id']);
        });
        Schema::table('establishments', function (Blueprint $table){
            $table->dropForeign(['category_id']);
        });

        Schema::dropIfExists('establishments');
    }
}
