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
            $table->string('imagen')->nullable()->default('');
            $table->integer('representante_id')->nullable()->unsigned();
            
            

            //$table->foreign('representante_id')->references('id')->on('detalle_representante');
            //$table->foreign('eventos_id')->references('id')->on('eventos');
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
        Schema::dropIfExists('banda');
    }
}
