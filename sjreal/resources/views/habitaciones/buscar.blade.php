@extends('layouts.base')
@section('content')
<div class="">
    <h2>Consultar disponibilidad</h2>
    {{-- empleado_id(Se setea segun el usuario autenticado), habitacion_id, noches_hospedaje, estado_hospedaje, fecha_hospedaje, fecha_ingreso, fecha_salida --}}
    <form action="{{ route('habitaciones.consultar') }}" class="form form--vertical" method="post" id="">
        @csrf
        <ul class="list list--vertical">
            <li class="field field--vertical">
                <label class="field__label" for="ingreso_hospedaje">Fecha y hora de ingreso:</label>
                <input class="field__input" id="ingreso_hospedaje" name="ingreso_hospedaje" type="datetime-local" required>
            </li>

            <li class="field field--vertical">
                <label class="field__label" for="salida_hospedaje">Fecha y hora de salida:</label>
                <input class="field__input" id="salida_hospedaje" name="salida_hospedaje" type="datetime-local">
            </li>
    </ul>

    <input class="submit" type="submit" value="Enviar">

    </form>
</div>

@endsection
