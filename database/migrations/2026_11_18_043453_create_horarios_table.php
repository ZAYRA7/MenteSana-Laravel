<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    // Crea la tabla horarios con los campos definidos
    public function up(): void
    {
        Schema::create('horarios', function (Blueprint $table) {
            $table->id();
            $table->string('dia');
            $table->time('hora_inicio');
            $table->time('hora_fin');
            $table->string('estado')->default('Disponible');
            $table->timestamps();
        });
    }

    // Elimina la tabla si se revierte la migración
    public function down(): void
    {
        Schema::dropIfExists('horarios');
    }
};
