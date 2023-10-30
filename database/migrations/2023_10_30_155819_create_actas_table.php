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
        Schema::create('actas', function (Blueprint $table) {
            $table->id();
            $table->time('hora');
            $table->date('fecha');
            $table->date('fecha_prescripcion');
            $table->boolean('retencion_vehiculo')->default(false);
            $table->boolean('retencion_licencia')->default(false);
            $table->boolean('notificado')->default(false);
            $table->string('calle');
            $table->string('inspector')->nullable();
            $table->text('observaciones');
            $table->json('infracciones_cometidas');
            $table->unsignedBigInteger('prioridad_id');
            $table->unsignedBigInteger('vehiculo_id');
            $table->foreign('prioridad_id')->references('id')->on('prioridades');
            $table->foreign('vehiculo_id')->references('id')->on('vehiculos');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('actas');
    }
};
