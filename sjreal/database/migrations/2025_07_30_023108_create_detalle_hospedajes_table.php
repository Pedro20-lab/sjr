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
        Schema::create('detalle_hospedajes', function (Blueprint $table) {
            $table->id('id_detalle_hospedaje');
            $table->unsignedBigInteger('hospedaje_id');
            $table->unsignedBigInteger('huesped_id');
            $table->foreign('hospedaje_id')->references('id_hospedaje')->on('hospedajes')->onDelete('no action');
            $table->foreign('huesped_id')->references('id_huesped')->on('huespedes')->onDelete('no action');       
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detalle_hospedajes');
    }
};
