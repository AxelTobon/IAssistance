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
        Schema::create('solicituds', function (Blueprint $table) {
            $table->id('id');
            //$table->datetime('sol_fSolicitud');
            $table->string('nombre_empleado');
            $table->integer('numero_empleado');
            //$table->foreignId('numero_empleado')->unsigned();
            //$table->foreign('numero_empleado')->references('id')->on('users');
            $table->string('adscripcion');
            $table->integer('acumulador');
            

            
            


            
            
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
        Schema::dropIfExists('solicituds');
    }
};
