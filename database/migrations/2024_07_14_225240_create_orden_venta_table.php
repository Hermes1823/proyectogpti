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
        Schema::create('orden_venta', function (Blueprint $table) {
            $table->id('id_orden_venta');
            $table->date('fecha');
            $table->string('direccion');
            $table->string('dni')->nullable();
            $table->decimal('total');

            $table->foreign('dni')->references('dni')->on('cliente');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orden_venta');
    }
};
