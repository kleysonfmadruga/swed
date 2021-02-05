<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServiceIdEstablishmentIdTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('service_id_establishment_id', function (Blueprint $table) {
            $table->id();
            $table->decimal('price', 7, 2);
            $table->string('description');

            $table->foreignId('service_id');
            $table->foreignId('establishment_id');
            $table->timestampsTz();

            $table->foreign('service_id')
                    ->references('id')
                    ->on('services')
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
        Schema::dropIfExists('service_id_establishment_id');
    }
}
