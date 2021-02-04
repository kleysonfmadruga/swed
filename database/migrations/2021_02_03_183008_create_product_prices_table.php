<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductPricesTable extends Migration
{
    public function up()
    {
        Schema::create('product_prices', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->double('price', 10, 2);
            $table->string('description');
            $table->bigInteger('product_id')->unsigned();
        });

        Schema::table('product_prices', function (Blueprint $table){
            $table->foreign('product_id')->references('id')->on('products');
        });
    }

    public function down()
    {
        Schema::table('product_prices', function (Blueprint $table){
            $table->dropForeign(['product_id']);
        });

        Schema::dropIfExists('product_prices');
    }
}
