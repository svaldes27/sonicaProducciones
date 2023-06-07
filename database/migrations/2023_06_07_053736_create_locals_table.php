<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLocalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('local', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre');
            $table->string('direccion');

            $table->unsignedBigInteger('create_ciudad_table');
            $table->unsignedBigInteger('create_region_table');
            $table->foreing('create_ciudad_table')->references('id')->on('create_ciudad_table');
            $table->foreing('create_region_table')->references('id')->on('create_region_table');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('local');
    }
}
