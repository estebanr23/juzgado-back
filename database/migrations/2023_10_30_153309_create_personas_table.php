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
        Schema::create('personas', function (Blueprint $table) {
            $table->id();
            $table->string('nombre', 100);
            $table->string('apellido', 100);
            $table->date('fecha_alta');
            $table->enum('tipo_persona', ['HUMANA', 'JURIDICA'])->default('HUMANA');
            $table->date('fecha_nacimiento');
            $table->integer('numero_documento');
            $table->string('cedula_identidad')->nullable();
            $table->string('expedida_por')->nullable();
            $table->enum('estado_civil', ['SOLTERO', 'CASADO'])->default('SOLTERO');
            $table->enum('sexo', ['MASCULINO', 'FEMENINO']);
            $table->string('cuil', 20)->nullable();
            $table->string('email', 40)->nullable();
            $table->unsignedBigInteger('nacionalidad_id');
            $table->unsignedBigInteger('domicilio_id');
            $table->foreign('nacionalidad_id')->references('id')->on('nacionalidades');
            $table->foreign('domicilio_id')->references('id')->on('domicilios');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('personas');
    }
};
