<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStatesTable extends Migration
{
    public function up()
    {
        Schema::create('states', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('initial');
            $table->integer('code')->unique();
            $table->string('region');
            $table->timestampsTZ();
        });
    }

    public function down()
    {
        Schema::dropIfExists('states');
    }
}
