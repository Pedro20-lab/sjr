@extends('layouts.app')
@section('content')
<form action="{{route('guest.show', [1])}}" class="w-4/5 border-gray-100 rounded-sm" method="get">
    <h3>Buscar huesped</h3>
    <ul class="flex flex-col gap-2 mx-auto my-2">
        <li class="flex flex-row border-gray-200 rounded-sm gap-x-2">
            <label for="num_doc_guest">Número de doc:</label>
            <input id="num_doc_guest" name="num_doc_guest" type="text">
        </li>
        <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded">Buscar</button>
    </ul>

</form>

@if(isset($guest))
    <table>
        <caption>Tabla de huespedes <a href="{{ route('guest.create') }}">Agregar</a></caption>
        <thead>
        <tr>
            <th>Nombre</th>
            <th>Apellido</th>
            <th>Documento</th>
            <th>Numero doc</th>
            <th>Origen</th>
            <th>Teléfono</th>
            <th>Editar</th>
            <th>Eliminar</th>
        </tr>
        </thead>
        <tbody>
        {{--@forelse($guests as $guest)--}}
            <tr>
                <td>{{$guest->name_guest}}</td>
                <td>{{$guest->lastname_guest}}</td>
                <td>{{$guest->doc_guest}}</td>
                <td>{{$guest->num_doc_guest}}</td>
                <td>{{$guest->origin_guest}}</td>
                <td>{{$guest->phone_guest}}</td>
                <td>
                    <a href="{{route('guest.edit', ['guest' => $guest->id])}}">
                            <span  class="material-symbols-outlined">
                                edit
                            </span>
                    </a>
                </td>
                <td>
                    <a href="{{ route('guest.destroy', ['guest' => $guest->id]) }}">
                            <span  class="material-symbols-outlined">
                                delete
                            </span>
                    </a>
                </td>
            </tr>
        {{--@empty--}}
            <p>No se encontró la información solicitada</p>
        {{--@endforelse--}}

        </tbody>
    </table>

@endif
@endsection




