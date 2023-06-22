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
            $table->integer('comuna_id')->nullable()->unsigned();

            
            //$table->foreign('ciudad_id')->references('id')->on('ciudad');
            //$table->foreign('region_id')->references('id')->on('region');

            
            //$table->foreign('2023_06_05_053917_create_ciudad_table')->references('id')->on('2023_06_05_053917_create_ciudad_table');
            //$table->foreign('2023_06_05_053917_create_region_table')->references('id')->on('2023_06_05_053917_create_region_table');
            //$table->timestamps();
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
