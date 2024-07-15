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
        Schema::create('orden_compra', function (Blueprint $table) {
            $table->id('id_orden_compra');
            $table->date('fecha');
            $table->string('direccion');
            $table->decimal('sub_total');
            $table->decimal('total');
            $table->string('ruc',25);

            $table->foreign('ruc')->references('ruc')->on('proveedor');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orden_compra');
    }
};
