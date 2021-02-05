<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAddressEstablishmentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('address_establishment', function (Blueprint $table) {
            $table->id();
            $table->string('neighborhood');
            $table->string('street');
            $table->string('cep');
            $table->foreignId('city_id');
            $table->foreignId('establishment_id');

            $table->foreign('city_id')
                    ->references('id')
                    ->on('cities')
                    ->cascadeOnDelete()
                    ->cascadeOnUpdate();
            $table->foreign('establishment_id')
                    ->references('id')
                    ->on('establishments')
                    ->cascadeOnDelete()
                    ->cascadeOnUpdate();

            $table->timestampsTz();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('address_establishment');
    }
}
