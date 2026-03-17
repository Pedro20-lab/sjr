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
        Schema::create('detalle_pagos', function (Blueprint $table) {
            $table->id('id_detalle_pago');

            $table->unsignedBigInteger('pago_id');
            $table->unsignedBigInteger('hospedaje_id');

            $table->foreign('pago_id')->references('id_pago')->on('pagos')->onDelete('no action');
            $table->foreign('hospedaje_id')->references('id_hospedaje')->on('hospedajes')->onDelete('no action');
            
            $table->integer('cantidad_item');
            $table->decimal('precio_por_unidad', 10, 2);
            $table->decimal('total_detalle', 10, 2);
            $table->date('fecha_pago');
            $table->string('metodo_pago', 20);
            $table->string('estado_pago', 20);
            $table->string('descripcion_pago', 255)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detalle_pagos');
    }
};
