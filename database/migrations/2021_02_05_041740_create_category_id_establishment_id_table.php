<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoryIdEstablishmentIdTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('category_id_establishment_id', function (Blueprint $table) {
            $table->id();
            $table->foreignId('category_id');
            $table->foreignId('establishment_id');
            $table->timestampsTz();

            $table->foreign('category_id')
                    ->references('id')
                    ->on('categories')
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
        Schema::dropIfExists('category_id_establishment_id');
    }
}
