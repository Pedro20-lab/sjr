@extends('layouts.app')
@section('content')
<div class="">
    <h2>Bienvenido al panel de Reservas</h2>
    <p>Este dashboard está destinado al agendamiento y monitoreo de las reservas, elige la opción que desees</p>
    <nav class="list list--vertical">
        <a class="link" href="{{ route('lodgement.create') }}">
            <span class="material-symbols-outlined">
                description
            </span>
            <label>Agendar reserva</label>            
        </a>
        <a class="link" href="{{ route('lodgement.index') }}">
            <span class="material-symbols-outlined">
                description
            </span>
            <label for="">Buscar reserva</label>
        </a>
    </nav>
</div>

@endsection
