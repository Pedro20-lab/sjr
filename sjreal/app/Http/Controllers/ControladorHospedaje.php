<?php

namespace App\Http\Controllers;

use App\Models\DetalleHospedaje;
use App\Models\Hospedaje;
use App\Models\Huesped;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\JsonResponse;

class ControladorHospedaje
{

    public function store(Request $request): JsonResponse
    {
        $validated = $request->validate([
            'empleado_id' => ['required', 'integer'],
            'habitacion_id' => ['required', 'integer'],
            'check_in' => ['required', 'date'],
            'check_out' => ['required', 'date', 'after:check_in'],
            'guests' => ['required', 'array', 'min:1'],
            'guests.*.documentNumber' => ['required', 'string'],
            'guests.*.documentType' => ['required', 'string'],
            'guests.*.name' => ['required', 'string'],
            'guests.*.lastname' => ['required', 'string'],
        ]);

        $result = DB::transaction(function () use ($validated) {
            $ingreso = Carbon::parse($validated['check_in']);
            $salida = Carbon::parse($validated['check_out']);

            $childTypes = ['TI', 'RC'];

            $cantidadNinos = collect($validated['guests'])
                ->filter(fn ($guest) => in_array(strtoupper($guest['documentType']), $childTypes))
                ->count();

            $cantidadAdultos = count($validated['guests']) - $cantidadNinos;

            $hospedaje = Hospedaje::create([
                'empleado_id' => $validated['empleado_id'],
                'habitacion_id' => $validated['habitacion_id'],
                'ingreso_hospedaje' => $ingreso,
                'salida_hospedaje' => $salida,
                'noches_hospedaje' => $ingreso->diffInDays($salida),
                'cantidad_adultos' => $cantidadAdultos,
                'cantidad_ninos' => $cantidadNinos,
                'estado_hospedaje' => 'Sin confirmar',
            ]);

            $detalles = [];

            foreach ($validated['guests'] as $guestPayload) {
                $huesped = Huesped::firstOrCreate(
                    ['num_doc_huesped' => $guestPayload['documentNumber']],
                    [                                                
                        'tipo_doc_huesped' => $guestPayload['documentType'],
                        'nombre_huesped' => $guestPayload['name'],
                        'apellido_huesped' => $guestPayload['lastname'],
                        'nacionalidad_huesped' => $guestPayload['nacionality'],
                        'telefono_huesped' => $guestPayload['phoneNumber'],
                        'fecha_nacimiento_huesped' => $guestPayload['birthDate'] ?? null,
                        ]
                );

                $detalles[] = DetalleHospedaje::create([
                    'hospedaje_id' => $hospedaje->id_hospedaje,
                    'huesped_id' => $huesped->id_huesped,
                ]);
            }

            return [
                'hospedaje' => $hospedaje,
                'detalles' => $detalles,
            ];
        });

        return response()->json($result, 201);
    }
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
