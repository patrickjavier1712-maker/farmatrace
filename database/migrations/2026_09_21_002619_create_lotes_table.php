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
        Schema::create('lotes', function (Blueprint $table) {
            $table->id();
            $table->string('codigo_lote')->unique(); // unique() evita que registres el mismo lote dos veces
            $table->string('nombre_medicamento');
            $table->integer('stock');
            $table->date('fecha_vencimiento');
            $table->timestamps(); // Crea las columnas created_at y updated_at automáticamente
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lotes');
    }
};
