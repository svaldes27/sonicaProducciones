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
            $table->integer('local_id')->nullable()->unsigned();
            $table->integer('banda_id')->nullable()->unsigned();
            $table->integer('detalleEquipamiento_id')->nullable()->unsigned();
            $table->time('hora');
            $table->date('fecha');

            //$table->integer('local_id')->nullable()->unsigned();
            //$table->integer('detalle_id')->nullable()->unsigned();
            //$table->integer('banda_id')->nullable()->unsigned();

                        
            //$table->foreign('local_id')->references('id')->on('create_locals_table');
            //$table->foreign('detalle_id')->references('id')->on('create_detalle_equipamiento_table');
            //$table->foreign('banda_id')->references('id')->on('create_bandas_table');
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
        Schema::dropIfExists('evento');
    }
}
