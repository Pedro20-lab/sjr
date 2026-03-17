<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ControladorHabitacion
{
    public function buscarHabitaciones() {
        return view('habitaciones.buscar');
    }

    public function consultarDisponibilidad(Request $peticion)
    {
        if (!$peticion->has(['ingreso_hospedaje', 'salida_hospedaje'])) {
            return redirect()->back()->withErrors('Por favor, ingrese las fechas de ingreso y salida.');
        }
        $peticion->validate([
            'ingreso_hospedaje' => ['required', 'date', 'before:salida_hospedaje'],
            'salida_hospedaje' => ['required', 'date', 'after:ingreso_hospedaje']
        ]);

        $ingreso = $peticion->input('ingreso_hospedaje');
        $salida = $peticion->input('salida_hospedaje');

        $habitacionesDisponibles = DB::select(
            "SELECT habs.id_habitacion, habs.numero_habitacion, habs.tipo_habitacion, habs.precio_habitacion, habs.capacidad_habitacion
                    FROM habitaciones habs
                    WHERE NOT EXISTS (
                        SELECT 1
                        FROM hospedajes h
                        WHERE h.habitacion_id = habs.id_habitacion
                        AND h.salida_hospedaje > ?
                        AND h.ingreso_hospedaje < ?);",
                    [$ingreso, $salida]);

        return view('habitaciones.disponibles', ['habitacionesDisponibles' => $habitacionesDisponibles]);
    }

}
