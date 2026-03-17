<?php

namespace App\Http\Controllers;

use App\Rules\TipoDocumento;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class ControladorHuesped
{
    public function crear(): View {
        return view('huesped.crear');
    }

    public function guardar(Request $peticion) {

    $cantidad_huespedes = $peticion->input('cantidad_huespedes');

        if (!$cantidad_huespedes || $cantidad_huespedes <= 0) {
            return redirect()->back()->withErrors(['cantidad_huespedes' => 'La cantidad de huéspedes es requerida y debe ser mayor a 0']);
        }

        $peticion->validate([
            'guest' => ['required', 'array', 'min:' . $cantidad_huespedes],
            'guest.*.num_doc_huesped' => ['required', 'unique:huespedes,num_doc_huesped'],
            'guest.*.tipo_doc_huesped' => ['required', new TipoDocumento],
            'guest.*.nombre_huesped' => ['required', 'alpha:ascii'],
            'guest.*.apellido_huesped' => ['required', 'alpha:ascii'],
            'guest.*.nacionalidad_huesped' => ['required', 'alpha:ascii'],
            'guest.*.telefono_huesped' => ['numeric'],
            'guest.*.fecha_nacimiento_huesped' => ['date']
        ]);

        for ($i=0; $i < $cantidad_huespedes; $i++) {
            $huesped = new \App\Models\Huesped();
            $huesped->num_doc_huesped = $peticion->input('guest.'.$i.'.num_doc_huesped');
            $huesped->tipo_doc_huesped = $peticion->input('guest.'.$i.'.tipo_doc_huesped');
            $huesped->nacionalidad_huesped = $peticion->input('guest.'.$i.'.nacionalidad_huesped');
            $huesped->nombre_huesped = $peticion->input('guest.'.$i.'.nombre_huesped');
            $huesped->apellido_huesped = $peticion->input('guest.'.$i.'.apellido_huesped');
            $huesped->telefono_huesped = $peticion->input('guest.'.$i.'.telefono_huesped');
            $huesped->fecha_nacimiento_huesped = $peticion->input('guest.'.$i.'.fecha_nacimiento_huesped');
            $huesped->save();
        }
        // $peticion->validate([
        //     'num_doc_huesped' => ['required', 'unique:huespedes'],
        //     'tipo_doc_huesped' => ['required', new TipoDocumento],
        //     'nombre_huesped' => ['required', 'alpha:ascii'],
        //     'apellido_huesped' => ['required', 'alpha:ascii'],
        //     'nacionalidad_huesped' => ['required', 'alpha:ascii'],
        //     'telefono_huesped' => ['numeric'],
        //     //Añadir mensaje para la validación de este campo
        //     'fecha_nacimiento_huesped' => ['required', 'date']
        // ]);

        // $huesped = new \App\Models\Huesped();
        // $huesped->num_doc_huesped = $peticion->input('num_doc_huesped');
        // $huesped->tipo_doc_huesped = $peticion->input('tipo_doc_huesped');
        // $huesped->nacionalidad_huesped = $peticion->input('nacionalidad_huesped');
        // $huesped->nombre_huesped = $peticion->input('nombre_huesped');
        // $huesped->apellido_huesped = $peticion->input('apellido_huesped');
        // $huesped->telefono_huesped = $peticion->input('telefono_huesped');
        // $huesped->fecha_nacimiento_huesped = $peticion->input('fecha_nacimiento_huesped');
        // $huesped->save();
        // Redirigir a la vista de creación con un mensaje de éxito
        return view('huesped.mostrar')->with([
            'success' => true,
            'huesped' => $huesped
        ]);
    }

    //Busca huespedes por cedula
    public function mostrar($cedula) {
        $huesped = \App\Models\Huesped::where('num_doc_huesped', $cedula)->firstOrFail();
        return $huesped;
    }

    public function mostrar_todos() {
        $huespedes = \App\Models\Huesped::all();
        return $huespedes;
    }



}
