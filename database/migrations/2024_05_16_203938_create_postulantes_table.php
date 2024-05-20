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
            $table->string('dni')->unique();
            $table->date('fecha_nacimiento');
            $table->string('lugar_nacimiento');
            $table->string('domicilio');
            $table->string('localidad');
            $table->string('email')->unique();
            $table->string('telefono');
            $table->string('foto_postulante');
            $table->string('estado_civil');
            $table->string('nacionalidad');
            $table->string('cargo_ocupa');
            $table->date('antiguedad')->nullable();
            $table->date('buena_conducta')->nullable();
            $table->boolean('certificado_domicilio')->default(0);
            $table->boolean('foto')->default(0);
            $table->boolean('informacion_sumaria')->default(0);
            $table->date('matricula')->nullable();
            $table->date('psicofisico')->nullable();
            $table->date('redam')->nullable();
            $table->date('rupv')->nullable();
            $table->date('sanciones')->nullable();
            $table->boolean('titulo_autenticado')->default(0);
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
