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
        Schema::create('proveedor', function (Blueprint $table) {
            $table->string('ruc',25)->primary(); //ruc
            $table->string('razon_social');//Razon_social
            $table->string('encargado');//encargado
            $table->string('direccion');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('proveedor');
    }
};
