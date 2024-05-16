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
        Schema::create('documentaciones', function (Blueprint $table) {
            $table->id();
            $table->date('antiguedad');
            $table->date('buena_conducta');
            $table->boolean('domicilio');
            $table->boolean('foto_postulante');
            $table->boolean('informacion_sumaria');
            $table->date('matricula');
            $table->date('psicofisico');
            $table->date('redam');
            $table->date('rupv');
            $table->date('sanciones');
            $table->boolean('titulo_autenticado');
            $table->timestamps();
        });
    
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
