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
        Schema::create('postulantes', function (Blueprint $table) {
            $table->id();
            $table->string('apellido');
            $table->string('nombre');
            $table->string('dni');
            $table->date('fecha_nacimiento');
            $table->date('lugar_nacimiento');
            $table->string('domicilio');
            $table->string('localidad');
            $table->string('email');
            $table->string('telefono');
            $table->string('foto_postulante');
            $table->string('estado_civil');
            $table->string('nacionalidad');
            $table->string('cargo_ocupa');
            $table->foreignId('documentacion_id')->constrained('documentaciones')->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('postulantes');
    }
};
