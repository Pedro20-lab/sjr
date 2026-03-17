@extends('layouts.base')
@section('content')
{{-- Formulario de registro de huéspedes --}}
{{-- Hacer distinción entre niños y adultos en el formulario? --}}
<form method="POST" action="{{route('huesped.guardar')}}">
    @csrf
    @for($i = 0; $i < $cantidad_huespedes; $i++)
    <input type="hidden" name="cantidad_huespedes" value="{{ $cantidad_huespedes }}">
    {{-- Revisar si siguen funcionando los errores --}}
        <fieldset>
            <legend>Huesped {{ $i + 1}}</legend>

            <ul class="list list--vertical">
            <li class="field field--vertical">
                <label class="field__label" for="guest[{{$i}}][num_doc_huesped]">ID del documento</label>
                <input class="field__input @error("guest.$i.num_doc_huesped") field__input--alert @enderror" type="text" id="guest[{{$i}}][num_doc_huesped]" name="guest[{{$i}}][num_doc_huesped]" value="{{ old("guest.$i.num_doc_huesped") }}" required>
                @error("guest.$i.num_doc_huesped")
                    <span class="field__error field__label--alert">{{ $message }}</span>
                @else
                    <span id="num_doc_huesped-error" class="field__error hidden">Este campo es obligatorio</span>
                @enderror
            </li>
            <li class="field field--vertical">
                <label class="field__label" for="guest[{{$i}}][tipo_doc_huesped]">Tipo de documento</label>
                <select class="field__input @error("guest.$i.tipo_doc_huesped") field__input--alert @enderror" name="guest[{{$i}}][tipo_doc_huesped]" id="guest[{{$i}}][tipo_doc_huesped]" required>
                    <option value="CC" {{ old("guest.$i.tipo_doc_huesped") == 'CC' ? 'selected' : '' }}>Cédula de ciudadanía</option>
                    <option value="TI" {{ old("guest.$i.tipo_doc_huesped") == 'TI' ? 'selected' : '' }}>Tarjeta de identidad</option>
                    <option value="CE" {{ old("guest.$i.tipo_doc_huesped") == 'CE' ? 'selected' : '' }}>Cédula de extranjería</option>
                    <option value="PA" {{ old("guest.$i.tipo_doc_huesped") == 'PA' ? 'selected' : '' }}>Pasaporte</option>
                    <option value="RC" {{ old("guest.$i.tipo_doc_huesped") == 'RC' ? 'selected' : '' }}>Registro civil</option>
                    <option value="DE" {{ old("guest.$i.tipo_doc_huesped") == 'DE' ? 'selected' : '' }}>Documento extranjero</option>
                    <option value="PPT" {{ old("guest.$i.tipo_doc_huesped") == 'PPT' ? 'selected' : '' }}>PPT</option>
                </select>
                @error("guest.$i.tipo_doc_huesped")
                    <span class="field__error field__label--alert">{{ $message }}</span>
                @enderror
            </li>
            <li class="field field--vertical">
                {{-- Aqui seria deseable tener una lista de nacionalidades para mostrar --}}
                <label class="field__label" for="guest[{{$i}}][nacionalidad_huesped]">Nacionalidad</label>
                <input class="field__input @error("guest.$i.nacionalidad_huesped") field__input--alert @enderror" type="text" id="guest[{{$i}}][nacionalidad_huesped]" name="guest[{{$i}}][nacionalidad_huesped]" value="{{ old("guest.$i.nacionalidad_huesped") }}" required>
                @error("guest.$i.nacionalidad_huesped")
                    <span class="field__error field__label--alert">{{ $message }}</span>
                @else
                    <span id="nacionalidad_huesped-error" class="field__error hidden">Este campo es obligatorio</span>
                @enderror
            </li>
            <li class="field field--vertical">
                <label class="field__label" for="guest[{{$i}}][nombre_huesped]">Nombre</label>
                <input class="field__input @error("guest.$i.nombre_huesped") field__input--alert @enderror" type="text" id="guest[{{$i}}][nombre_huesped]" name="guest[{{$i}}][nombre_huesped]" value="{{ old("guest.$i.nombre_huesped") }}" required>
                @error("guest.$i.nombre_huesped")
                    <span class="field__error field__label--alert">{{ $message }}</span>
                @else
                    <span id="nombre_huesped-error" class="field__error hidden">Este campo solo debe contener letras</span>
                @enderror
            </li>
            <li class="field field--vertical">
                <label class="field__label" for="guest[{{$i}}][apellido_huesped]">Apellido</label>
                <input class="field__input @error("guest.$i.apellido_huesped") field__input--alert @enderror" type="text" id="guest[{{$i}}][apellido_huesped]" name="guest[{{$i}}][apellido_huesped]" value="{{ old("guest.$i.apellido_huesped") }}" required>
                @error("guest.$i.apellido_huesped")
                    <span class="field__error field__label--alert">{{ $message }}</span>
                @else
                    <span id="apellido_huesped-error" class="field__error hidden">Este campo solo debe contener letras</span>
                @enderror
            </li>
            <li class="field field--vertical">
                <label class="field__label" for="guest[{{$i}}][telefono_huesped]">Telefono</label>
                <input class="field__input @error("guest.$i.telefono_huesped") field__input--alert @enderror" type="text" id="guest[{{$i}}][telefono_huesped]" name="guest[{{$i}}][telefono_huesped]" value="{{ old("guest.$i.telefono_huesped") }}" required>
                {{-- Validación de teléfono colombiano: 7-10 dígitos numéricos (También puede incluir el código del país) --}}
                @error("guest.$i.telefono_huesped")
                    <span class="field__error field__label--alert">{{ $message }}</span>
                @else
                    <span id="telefono_huesped-error" class="field__error hidden">Este campo solo debe contener números</span>
                @enderror
            </li>
        </ul>
        </fieldset>

    @endfor

    <button type="submit">Guardar cambios</button>
</form>
@endsection
