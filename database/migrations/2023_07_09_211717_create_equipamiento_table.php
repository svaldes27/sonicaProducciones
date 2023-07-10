<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEquipamientoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('equipamiento', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->string('descripcion')->nullable();
            $table->integer('cantidad');
            $table->string('tipo');
            $table->integer('guitarras')->nullable();
            $table->integer('baterias')->nullable();
            $table->text('otros_instrumentos')->nullable();
            $table->text('requisitos_iluminacion')->nullable();
            $table->text('requisitos_especiales')->nullable();
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
        Schema::dropIfExists('equipamiento');
    }
}
