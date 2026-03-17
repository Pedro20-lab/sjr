@props(['id', 'numero', 'tipo', 'estado', 'precio', 'capacidad', 'sourcePhoto'])
{{--Make room's photos dinamic--}}
<div class="room">
    <img
        src="{{Vite::asset('resources/assets/logo.png')}}"
        class="room__image"
        alt="Imagen de habitacion"
    >

    <div class="room__info">
        <input type="hidden" value="{{$id}}">
        <h3 class="room__title">Habitacion {{ $numero }}</h3>
        <p class="room__type">{{ $tipo }}</p>
        <p class="room__price">Precio: {{ $precio }}</p>
        <p class="room__capacity">Capacidad: {{ $capacidad }}</p>
        {{--Que clase se aplica debe depender del estado--}}
        <span class="room__status room__status--available">{{ $estado }}</span>
        <a href="{{ route('hospedajes.crear', $id) }}" class="room__button">
            Reservar
        </a>
    </div>

</div>
