<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
       //https://laravel-docs.com/es/docs/10.x/migrations#column-method-id
    public function up(): void
    {
        Schema::create('cliente', function (Blueprint $table) {
            $table->string('DNI')->primary();
            $table->string('nombre');
            $table->string('apellidos');
            $table->string('numero');
            $table->boolean('estado');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cliente');
    }
};
