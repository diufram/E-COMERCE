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
        Schema::create('pedidos', function (Blueprint $table) {
            $table->id();
            $table->float('total');
            $table->char('estado');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('pago_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('pago_id')->references('id')->on('tpagos');
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pedidos');
    }
};
