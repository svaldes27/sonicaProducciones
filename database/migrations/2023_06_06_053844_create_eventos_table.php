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
            $table->dateTime('start');
            //$table->time('hora');
            //$table->date('fecha');

           
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
