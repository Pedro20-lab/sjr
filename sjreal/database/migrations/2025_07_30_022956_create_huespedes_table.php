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
        Schema::create('huespedes', function (Blueprint $table) {
            $table->id('id_huesped');
            $table->string('num_doc_huesped', 20);
            $table->string('tipo_doc_huesped', 10);
            $table->string('nombre_huesped', 45);
            $table->string('apellido_huesped', 45);
            $table->string('nacionalidad_huesped', 100);
            $table->string('telefono_huesped', 30);
            $table->date('fecha_nacimiento_huesped')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('huespedes');
    }
};
