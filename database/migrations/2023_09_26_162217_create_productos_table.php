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
        Schema::create('productos', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->unsignedBigInteger('talla_id')->nullable();
            $table->string('color');
            $table->bigInteger('cantidad');
            $table->float('precio');
            $table->unsignedBigInteger('categoria_id')->nullable();
            $table->unsignedBigInteger('sucursal_id')->nullable();
            $table->foreign('talla_id')->references('id')->on('tallas');
            $table->foreign('categoria_id')->references('id')->on('categorias');
            $table->foreign('sucursal_id')->references('id')->on('sucursals');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('productos');
    }
};
