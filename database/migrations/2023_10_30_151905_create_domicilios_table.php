<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('domicilios', function (Blueprint $table) {
            $table->id();
            $table->string('calle');
            $table->integer('numero')->nullable();
            $table->string('manzana_piso')->nullable();
            $table->string('lote_dpto')->nullable();
            $table->unsignedBigInteger('barrio_id');
            $table->unsignedBigInteger('pais_id');
            $table->unsignedBigInteger('provincia_id');
            $table->unsignedBigInteger('departamento_id');
            $table->unsignedBigInteger('localidad_id');
            $table->foreign('barrio_id')->references('id')->on('barrios');
            $table->foreign('pais_id')->references('id')->on('paises');
            $table->foreign('provincia_id')->references('id')->on('provincias');
            $table->foreign('departamento_id')->references('id')->on('departamentos');
            $table->foreign('localidad_id')->references('id')->on('localidades');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('domicilios');
    }
};
