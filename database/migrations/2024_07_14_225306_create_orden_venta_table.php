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
            $table->id('id_pedido');
            $table->decimal('total');
            $table->decimal('subtotal');
            $table->date('fecha');
            $table->foreign('id_pedido')->references('id_pedido')->on('pedido');
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
