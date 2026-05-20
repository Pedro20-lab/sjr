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
        Schema::create('parking', function (Blueprint $table) {
            $table->id('id_parking');
            $table->datetime('ingreso_parking');
            $table->datetime('salida_parking');
            $table->unsignedBigInteger('carro_id');
            $table->unsignedBigInteger('parking_lot_id');
            $table->foreign('carro_id')->references('id_carro')->on('carros')->onDelete('restrict');
            $table->foreign('parking_lot_id')->references('id_parking_lot')->on('parking_lot')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('parking');
    }
};
