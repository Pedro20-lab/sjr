@extends('layouts.base')
@section('content')
    {{-- DESARROLLAR VALIDACION DE DISPONIBILIDAD DE HABITACION --}}
    <h2>Resumen de hospedaje</h2>
<form action="{{ route('detalle_hospedaje.crear') }}" class="form form--vertical">
    @csrf
    <ul class="list list--vertical">
        <li class="field field--vertical">
            <label class="field__label" for="cantidad_adultos">Cantidad de adultos:</label>
            <input class="field__input" value="1" type="number" id="cantidad_adultos" name="cantidad_adultos" required>
            <span id="cantidad_adultos-error" class="field__error hidden">Este campo es obligatorio</span>
        </li>
        <li class="field field--vertical">
            <label class="field__label" for="cantidad_ninos">Cantidad de niños:</label>
            <input class="field__input" type="number" value="0" id="cantidad_ninos" name="cantidad_ninos" required>
            <span id="cantidad_ninos-error" class="field__error hidden">Este campo es obligatorio</span>
        </li>
        <li class="field field--vertical">
            {{-- Debe setearse por defecto al día actual --}}
            <label class="field__label" for="ingreso_hospedaje">Check-in:</label>
            <input class="field__input" type="datetime-local" id="ingreso_hospedaje" name="ingreso_hospedaje" required>
            <span id="ingreso_hospedaje-error" class="field__error hidden">Este campo es obligatorio</span>
        </li>
        <li class="field field--vertical">
            {{-- Debe setearse por defecto una noche después del check-in --}}
            <label class="field__label" for="salida_hospedaje">Check-out:</label>
            <input class="field__input" type="datetime-local" id="salida_hospedaje" name="salida_hospedaje" required>
            <span id="salida_hospedaje-error" class="field__error hidden">Este campo es obligatorio</span>
        </li>
        <li class="field field--vertical">
            {{-- Esto debe ser una lista despegable de habitaciones disponibles --}}
            <label class="field__label" for="habitacion_id">Número de habitación</label>
            <input class="field__input" type="text" id="habitacion_id" name="habitacion_id" value="@isset($room) {{$room->numero_habitacion}} @endisset" required>
            <span id="habitacion_id-error" class="field__error hidden">Este campo es obligatorio</span>
        </li>
        <li class="field field--vertical">
            {{-- Debe ser calculado segun el ingreso_hospedaje y salida_hospedaje --}}
            <label class="field__label" for="noches_hospedaje">Cantidad de noches:</label>
            <input class="field__input" type="number" id="noches_hospedaje" name="noches_hospedaje" required>
            <span id="noches_hospedaje-error" class="field__error hidden">Este campo es obligatorio</span>
        </li>
        <li class="field field--vertical">
            <label class="field__label" for="estado_hospedaje">Estado</label>
            <select  name="estado_hospedaje" id="estado_hospedaje">
                <option value="reservado">Reservado</option>
                <option value="cotizado">Cotizado</option>
                <option value="terminado">Terminado</option>
                <option value="en_curso">En curso</option>
            </select>
        </li>

    </ul>

    <input class="submit" type="submit" value="Continuar">
</form>

{{-- Once this form is done, guests form must be displayed (according to the amount of guests) --}}
@endsection
