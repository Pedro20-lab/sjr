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
        Schema::create('hospedajes', function (Blueprint $table) {
            $table->id('id_hospedaje');
            $table->unsignedBigInteger('empleado_id');
            $table->unsignedBigInteger('habitacion_id');
            $table->integer('cantidad_adultos');
            $table->integer('cantidad_ninos');
            $table->integer('noches_hospedaje');
            $table->string('estado_hospedaje', 20);       
            $table->datetime('ingreso_hospedaje');
            $table->datetime('salida_hospedaje');
            $table->timestamps();
            
            $table->foreign('empleado_id')->references('id_empleado')->on('empleados')->onDelete('no action');
            $table->foreign('habitacion_id')->references('id_habitacion')->on('habitaciones')->onDelete('no action');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hospedajes');
    }
};
