<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetalleEquipamientoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detalle_equipamiento', function (Blueprint $table) {
            $table->increments('id');

            $table->unsignedBigInteger('create_equipamiento_table');
            $table->unsignedBigInteger('create_bandas_table');

            $table->foreing('create_equipamiento_table')->references('id')->on('create_equipamiento_table');
            $table->foreing('create_bandas_table')->references('id')->on('create_bandas_table');
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
        Schema::dropIfExists('detalle_equipamiento');
    }
}
