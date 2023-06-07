<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEventosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('evento', function (Blueprint $table) {
            $table->increments('id');
            $table->date('fecha');

            $table->unsignedBigInteger('create_locals_table');
            $table->unsignedBigInteger('create_detalle_equipamiento_table');
            $table->unsignedBigInteger('create_bandas_table');

            $table->foreing('create_locals_table')->references('id')->on('create_locals_table');
            $table->foreing('create_detalle_equipamiento_table')->references('id')->on('create_detalle_equipamiento_table');
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
        Schema::dropIfExists('evento');
    }
}
