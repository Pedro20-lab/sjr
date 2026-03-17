@extends('layouts.base')
@section('content')
<div class="">
    <h2>Agendar servicio de hospedaje</h2>
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
            <li class="field field--vertical">
                <label class="field__label" for="cantidad_adultos">¿Cuántos adultos se van a hospedar?</label>
                <input class="field__input" id="cantidad_adultos" name="cantidad_adultos" type="number">
            </li>
            <li class="field field--vertical">
                <label class="field__label" for="cantidad_ninos">¿Cuántos niños se van a hospedar?</label>
                <input class="field__input" id="cantidad_ninos" name="cantidad_ninos" type="number">
            </li>
            <li class="field field--vertical">
                <label class="field__label" for="noches_hospedaje">¿Cuántas noches se van a hospedar?</label>
                <input class="field__input" id="noches_hospedaje" name="noches_hospedaje" type="number">                
            </li>                            
    </ul>

    <input class="submit" type="submit" value="Enviar">

    </form>
</div>

@endsection
