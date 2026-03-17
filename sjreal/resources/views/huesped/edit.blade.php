@extends('layouts.app')
@section('content')
    <form action="{{ route('guest.update', ['guest' => $guest->id]) }}" class="w-4/5 border-gray-100 rounded-sm" method="post">
        @method('PUT')
        @csrf
        {{--  Campos: Nombre, apellido, documento, nro documento, origen (nacionalidad), telefono  --}}
        <ul class="flex flex-col gap-2 mx-auto my-2">
            <li class="flex flex-row border-gray-200 rounded-sm gap-x-2">
                <label for="name_guest">Nombre:</label>
                <input id="name_guest" name="name_guest" type="text" value="{{ $guest->name_guest }}">
            </li>
            <li class="flex flex-row border-gray-200 rounded-sm gap-x-2">
                <label for="lastname_guest">Apellido:</label>
                <input id="lastname_guest" name="lastname_guest" type="text" value="{{ $guest->lastname_guest }}">
            </li>
            <li class="flex flex-row border-gray-200 rounded-sm gap-x-2">
                <label for="doc_guest">Tipo de documento:</label>
                <select id="doc_guest" name="doc_guest">
                    <option value="CC">CC</option>
                    <option value="TI">TI</option>
                    <option value="pasaporte">Pasaporte</option>
                    <option value="CE">CE</option>
                </select>
            </li>
            <li class="flex flex-row border-gray-200 rounded-sm gap-x-2">
                <label for="num_doc_guest">Número de doc.</label>
                <input id="num_doc_guest" name="num_doc_guest" type="text" value="{{ $guest->num_doc_guest }}">
            </li>
            <li class="flex flex-row border-gray-200 rounded-sm gap-x-2">
                <label for="origin_guest">Origen:</label>
                <input id="origin_guest" name="origin_guest" type="text" value="{{ $guest->origin_guest }}">
            </li>
            <li class="flex flex-row border-gray-200 rounded-sm gap-x-2">
                <label for="phone_guest">Celular:</label>
                <input id="phone_guest" name="phone_guest" type="text" value="{{ $guest->phone_guest  }}">
            </li>
            <li>
                <input type="submit" value="Enviar">
            </li>
        </ul>

    </form>
@endsection



