{{-- Esto tiene que darsele estilos --}}
@extends('layouts.base')
@isset($success)
    <div>
        <p>{{ 'El huesped ha sido creado exitosamente.' }}</p>
    </div>    
@endisset
@section('content')
    <h1>Detalles del Huesped</h1>
    <p><strong>Nombre:</strong> {{ $huesped->nombre_huesped }}</p>
    <p><strong>Apellido:</strong> {{ $huesped->apellido_huesped }}</p>
    <p><strong>Documento:</strong> {{ $huesped->id_doc_huesped }}</p>
    <p><strong>Tipo de Documento:</strong> {{ $huesped->tipo_doc_huesped }}</p>
    <p><strong>Nacionalidad:</strong> {{ $huesped->nacionalidad_huesped }}</p>
    <p><strong>Telefono:</strong> {{ $huesped->telefono_huesped }}</p>
@endsection