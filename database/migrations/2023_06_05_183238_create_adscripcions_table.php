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
        Schema::create('adscripcions', function (Blueprint $table) {
            $table->id();
            $table->string('adscripcion');
            $table->timestamps();
        });
        DB::table('adscripcions')->insert([
            ['adscripcion' => 'Administración'],
            ['adscripcion' => 'Informatica'],
            ['adscripcion' => 'Procesos de Produccion'],
            ['adscripcion' => 'Comercialización'],
            ['adscripcion' => 'Tecnología Ambiental'],
            ['adscripcion' => 'Telematica'],
            ['adscripcion' => 'Tecnologias de la informacion y Comunicacion'],
            
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('adscripcions');
    }
};
