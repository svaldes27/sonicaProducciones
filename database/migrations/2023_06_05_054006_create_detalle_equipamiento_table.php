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
            $table->String('evento');
            $table->String('cantidad');
            $table->integer('evento_id')->nullable()->unsigned();
            $table->integer('equipamiento_id')->nullable()->unsigned();

            //$table->integer('equipamiento_id')->nullable()->unsigned();
            //$table->integer('banda_id')->nullable()->unsigned();


            //$table->foreign('equipamiento_id')->references('id')->on('create_equipamiento_table');
            //$table->foreign('banda_id')->references('id')->on('create_bandas_table');
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
