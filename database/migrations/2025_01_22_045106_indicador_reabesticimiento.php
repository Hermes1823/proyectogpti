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
        Schema::create('indicador_reabesticimiento', function (Blueprint $table) {
            $table->id();
            $table->string('fecha');
            $table->string('hora_inicio');
            $table->string('hora_final');
            $table->string('diferencia_tiempo');
            $table->unsignedBigInteger('diferencia_segundo');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('indicador_reabesticimiento');
    }
};
