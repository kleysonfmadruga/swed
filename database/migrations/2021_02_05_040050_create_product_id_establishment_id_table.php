<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductIdEstablishmentIdTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_id_establishment_id', function (Blueprint $table) {
            $table->id();

            $table->decimal('price', 7, 2);
            $table->string('description');

            $table->foreignId('product_id');
            $table->foreignId('establishment_id');

            $table->timestampsTz();

            $table->foreign('product_id')
                    ->references('id')
                    ->on('products')
                    ->cascadeOnDelete()
                    ->cascadeOnUpdate();

            $table->foreign('establishment_id')
                    ->references('id')
                    ->on('establishments')
                    ->cascadeOnDelete()
                    ->cascadeOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('product_id_establishment_id');
    }
}
