<?php

namespace App\Http\Controllers;

use App\Models\Habitacion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RoomController
{

    public function queryAvailable(Request $request)
    {
        
        $ingreso = $request->input('check_in');
        $salida = $request->input('check_out');

        if (!$request->has(['check_in', 'check_out'])) {
            return redirect()->back()->withErrors('Por favor, ingrese las fechas de ingreso y salida.');
        }
        $validated =$request->validate([
            'check_in' => ['required', 'date', 'before:check_out'],
            'check_out' => ['required', 'date', 'after:check_in']
        ]);
        $habitacionesDisponibles = DB::select(
        "SELECT habs.id_habitacion, habs.numero_habitacion, habs.tipo_habitacion, habs.precio_habitacion, habs.capacidad_habitacion
                FROM habitaciones habs
                WHERE NOT EXISTS (
                    SELECT 1
                    FROM hospedajes h
                    WHERE h.habitacion_id = habs.id_habitacion
                    AND h.salida_hospedaje > ?
                    AND h.ingreso_hospedaje < ?);",
                [$validated['check_in'], $validated['check_out']]);
        return response()->json([
            'message' => 'Consulta de habitaciones disponibles',
            'ingreso' => $validated['check_in'],
            'salida' => $validated['check_out'],
            'habitacionesDisponibles' => $habitacionesDisponibles
        ]);
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
