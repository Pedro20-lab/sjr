@extends('layouts.base')
{{-- Diseño para componente habitación
    Foto, numero, tipo, descripcion, disponibilidad
 --}}
@section('content')

@foreach($habitacionesDisponibles as $habitacionDisponible)
    <x-habitacion
        :id="$habitacionDisponible->id_habitacion"
        :numero="$habitacionDisponible->numero_habitacion"
        :tipo="$habitacionDisponible->tipo_habitacion"
        estado="Disponible"
        :precio="$habitacionDisponible->precio_habitacion"
        :capacidad="$habitacionDisponible->capacidad_habitacion"
        sourcePhoto="To refine"   
    ></x-habitacion>
@endforeach
@endsection
