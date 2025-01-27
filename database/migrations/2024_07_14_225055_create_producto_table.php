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
        Schema::create('producto', function (Blueprint $table) {
            $table->id('id_producto');
            $table->string('descripcion',60);
            $table->text('imagen');
            $table->unsignedBigInteger('id_medida')->nullable();
            $table->unsignedBigInteger('id_marca')->nullable();
            $table->unsignedBigInteger('id_categoria')->nullable();
            $table->decimal('precio_venta');
            $table->decimal('precio_compra');
            $table->bigInteger('cantidad');

            $table->foreign('id_medida')->references('id_medida')->on('unidad_medida');
            $table->foreign('id_marca')->references('id_marca')->on('marca');
            $table->foreign('id_categoria')->references('id_categoria')->on('categoria');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('producto');
    }
};
