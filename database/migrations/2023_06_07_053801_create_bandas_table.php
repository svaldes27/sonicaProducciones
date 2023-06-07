<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBandasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('banda', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre');

            $table->unsignedBigInteger('create_representante_table');
            $table->unsignedBigInteger('create_eventos_table');

            $table->foreing('create_representante_table')->references('id')->on('create_representante_table');
            $table->foreing('create_eventos_table')->references('id')->on('create_eventos_table');
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
        Schema::dropIfExists('banda');
    }
}
