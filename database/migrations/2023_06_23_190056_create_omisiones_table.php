<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('omisiones', function (Blueprint $table) {
            $table->id();
            $table->integer('numero_empleado');
            $table->string('nombre_empleado');
            $table->string('adscripcion');
            $table->string('puesto');
            $table->string('incidencia');
            $table->date('fecha');
            $table->string('motivo');
            $table->string('notas')->nullable();
            $table->string('archivo')->nullable();
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
        Schema::dropIfExists('omisiones');
    }
};
