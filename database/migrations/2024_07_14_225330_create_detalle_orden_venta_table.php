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
        Schema::create('detalle_orden_venta', function (Blueprint $table) {
            $table->id('id');
            $table->integer('cantidad');
            $table->decimal('precio');
            $table->unsignedBigInteger('id_orden_venta')->nullable();
            $table->unsignedBigInteger('id_producto')->nullable();
            $table->foreign('id_orden_venta')->references('id_orden_venta')->on('orden_venta')->onDelete('cascade');//optional ->change()
            $table->foreign('id_producto')->references('id_producto')->on('producto')->onDelete("set null");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detalle_orden_venta');
    }
};
