<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCitiesTable extends Migration
{
    public function up()
    {
        Schema::create('cities', function (Blueprint $table) {
            $table->id();

            $table->string('name');
            $table->string('city_code');
            $table->foreignId('state_id');
            $table->timestampsTz();

            $table->foreign('state_id')
                ->references('id')
                ->on('states')
                ->cascadeOnDelete()
                ->cascadeOnUpdate();

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
