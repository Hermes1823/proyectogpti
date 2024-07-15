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
        Schema::create('almacen_producto', function (Blueprint $table) {
            $table->id();
            $table->integer('stock');
            $table->unsignedBigInteger('id_producto');
            $table->unsignedBigInteger('id_almacen');
            $table->foreign('id_producto')->references('id_producto')->on('producto');
            $table->foreign('id_almacen')->references('id_almacen')->on('almacen');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('almacen_producto');
    }
};
