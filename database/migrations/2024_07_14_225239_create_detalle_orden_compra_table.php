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
        Schema::create('detalle_orden_compra', function (Blueprint $table) {
            $table->id('id');
            $table->unsignedBigInteger('id_orden_compra')->nullable();
            $table->unsignedBigInteger('id_producto')->nullable();
            $table->integer('cantidad');
            $table->decimal('precio');

            $table->foreign('id_orden_compra')->references('id_orden_compra')->on('orden_compra')->onDelete("CASCADE");
            $table->foreign('id_producto')->references('id_producto')->on('producto')->onDelete("set null");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detalle_orden_compra');
    }
};
