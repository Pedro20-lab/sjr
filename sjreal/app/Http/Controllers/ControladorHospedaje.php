<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ControladorHospedaje
{
    /**
     * Mostrar lista de hospedajes
     */
    public function listar_hospedajes() {
        $hospedajes = \App\Models\Hospedaje::all();
        return $hospedajes;
    }

    /**
     * Mostrar el formulario para un resumen de hospedaje
     */
    public function crear_hospedaje() {
        return view('hospedajes.resumen');
    }

    /**
     * Guardar un nuevo hospedaje
     * Como relaciono la tabla de particion detalle con la tabla de hospedaje?
     */
    public function guardar_hospedaje($peticion) {

    }
}
