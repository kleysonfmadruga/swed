<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServicePricesTable extends Migration
{
    public function up()
    {
        Schema::create('service_prices', function (Blueprint $table) {
            $table->double('price', 10, 2);
            $table->string('description');
            $table->bigInteger('service_id')->unsigned();
        });

        Schema::table('service_prices', function (Blueprint $table){
            $table->foreign('service_id')->references('id')->on('services');
        });
    }

    public function down()
    {
        Schema::table('service_prices', function (Blueprint $table){
            $table->dropForeign(['service_id']);
        });

        Schema::dropIfExists('service_prices');
    }
}
