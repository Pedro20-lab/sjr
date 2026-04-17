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
        Schema::create('empleados', function (Blueprint $table) {
            $table->id('id_empleado');            
            $table->string('nombre_empleado', 45);
            $table->string('apellido_empleado', 45);
            $table->string('tipo_doc_empleado', 10);
            $table->string('numero_doc_empleado', 20);
            $table->string('telefono_empleado', 30);
            $table->string('password', 255);
            $table->string('email', 30)->unique();
            $table->string('rol_empleado');
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('empleados');
    }
};
