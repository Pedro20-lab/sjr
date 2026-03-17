
@if ($errors->any())
    <div>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
@extends('layouts.base')
@section('content')
    <h2 class="">Añadir huesped</h2>
    <form action="{{ route('huesped.guardar') }}" class="form form--vertical" method="post" id="huespedForm">
        @csrf    
        <ul class="list list--vertical">
            <li class="field field--vertical">
                <label class="field__label" for="num_doc_huesped">ID del documento</label>
                <input class="field__input" type="text" id="num_doc_huesped" name="num_doc_huesped" required>
                <span id="num_doc_huesped-error" class="field__error hidden">Este campo es obligatorio</span>
            </li>
            <li class="field field--vertical">
                <label class="field__label" for="tipo_doc_huesped">Tipo de documento</label>
                <select class="field__input" name="tipo_doc_huesped" id="tipo_doc_huesped" required>
                    <option value="CC">Cédula de ciudadanía</option>
                    <option value="TI">Tarjeta de identidad</option>
                    <option value="CE">Cédula de extranjería</option>
                    <option value="PA">Pasaporte</option>
                    <option value="RC">Registro civil</option>
                    <option value="DE">Documento extranjero</option>
                    <option value="PPT">PPT</option>
                </select>
            </li>
            <li class="field field--vertical">
                {{-- Aqui seria deseable tener una lista de nacionalidades para mostrar --}}
                <label class="field__label" for="nacionalidad_huesped">Nacionalidad</label>
                <input class="field__input" type="text" id="nacionalidad_huesped" name="nacionalidad_huesped" required>
                <span id="nacionalidad_huesped-error" class="field__error hidden">Este campo es obligatorio</span>
            </li>
            <li class="field field--vertical">
                <label class="field__label" for="nombre_huesped">Nombre</label>
                <input class="field__input" type="text" id="nombre_huesped" name="nombre_huesped" required>
                <span id="nombre_huesped-error" class="field__error hidden">Este campo solo debe contener letras</span>
            </li>
            <li class="field field--vertical">
                <label class="field__label" for="apellido_huesped">Apellido</label>
                <input class="field__input" type="text" id="apellido_huesped" name="apellido_huesped" required>
                <span id="apellido_huesped-error" class="field__error hidden">Este campo solo debe contener letras</span>
            </li>
            <li class="field field--vertical">
                <label class="field__label" for="telefono_huesped">Telefono</label>
                <input class="field__input" type="text" id="telefono_huesped" name="telefono_huesped" required>
                {{-- Validación de teléfono colombiano: 7-10 dígitos numéricos (También puede incluir el código del país) --}}
                <span id="telefono_huesped-error" class="field__error hidden">Este campo solo debe contener números</span>
            </li>
        </ul>
        <input class="submit" type="submit" value="Enviar">
    </form>

@endsection

<script>
document.addEventListener('DOMContentLoaded', function() {
    const form = document.getElementById('huespedForm');
    
    // Remove hidden class from error spans for easier manipulation
    const errorSpans = document.querySelectorAll('.field__error');
    errorSpans.forEach(span => {
        span.classList.remove('hidden');
        span.style.display = 'none';
        span.style.color = 'red';
        span.style.fontSize = '0.8em';
    });
    
    // Validation functions
    function showFieldError(fieldId, message) {
        const errorSpan = document.getElementById(fieldId + '-error');
        if (errorSpan) {
            errorSpan.textContent = message;
            errorSpan.style.display = 'block';
        }
    }
    
    function hideFieldError(fieldId) {
        const errorSpan = document.getElementById(fieldId + '-error');
        if (errorSpan) {
            errorSpan.style.display = 'none';
        }
    }
    
    function clearAllErrors() {
        const errorSpans = document.querySelectorAll('.field__error');
        errorSpans.forEach(span => {
            span.style.display = 'none';
        });
    }
    
    // Field validation functions
    function validateIdDocumento() {
        const idDoc = document.getElementById('id_doc_huesped').value.trim();
        if (idDoc === '') {
            showFieldError('id_doc_huesped', 'Este campo es obligatorio');
            return false;
        }
        // Colombian ID validation (numbers only, 6-12 digits)
        if (!/^\d{6,12}$/.test(idDoc)) {
            showFieldError('id_doc_huesped', 'El ID debe contener entre 6 y 12 dígitos numéricos');
            return false;
        }
        hideFieldError('id_doc_huesped');
        return true;
    }
    
    function validateNacionalidad() {
        const nacionalidad = document.getElementById('nacionalidad_huesped').value.trim();
        if (nacionalidad === '') {
            showFieldError('nacionalidad_huesped', 'Este campo es obligatorio');
            return false;
        }
        // Only letters, spaces, and accents
        if (!/^[a-zA-ZáéíóúÁÉÍÓÚñÑ\s]+$/.test(nacionalidad)) {
            showFieldError('nacionalidad_huesped', 'Este campo solo debe contener letras');
            return false;
        }
        hideFieldError('nacionalidad_huesped');
        return true;
    }
    
    function validateNombre() {
        const nombre = document.getElementById('nombre_huesped').value.trim();
        if (nombre === '') {
            showFieldError('nombre_huesped', 'Este campo es obligatorio');
            return false;
        }
        // Only letters, spaces, and accents
        if (!/^[a-zA-ZáéíóúÁÉÍÓÚñÑ\s]+$/.test(nombre)) {
            showFieldError('nombre_huesped', 'Este campo solo debe contener letras');
            return false;
        }
        hideFieldError('nombre_huesped');
        return true;
    }
    
    function validateApellido() {
        const apellido = document.getElementById('apellido_huesped').value.trim();
        if (apellido === '') {
            showFieldError('apellido_huesped', 'Este campo es obligatorio');
            return false;
        }
        // Only letters, spaces, and accents
        if (!/^[a-zA-ZáéíóúÁÉÍÓÚñÑ\s]+$/.test(apellido)) {
            showFieldError('apellido_huesped', 'Este campo solo debe contener letras');
            return false;
        }
        hideFieldError('apellido_huesped');
        return true;
    }
    
    function validateTelefono() {
        const telefono = document.getElementById('telefono_huesped').value.trim();
        if (telefono === '') {
            showFieldError('telefono_huesped', 'Este campo es obligatorio');
            return false;
        }
        // Colombian phone validation (7-10 digits)
        if (!/^\d{7,10}$/.test(telefono)) {
            showFieldError('telefono_huesped', 'El teléfono debe contener entre 7 y 10 dígitos numéricos');
            return false;
        }
        hideFieldError('telefono_huesped');
        return true;
    }
    
    // Add real-time validation listeners
    document.getElementById('id_doc_huesped').addEventListener('blur', validateIdDocumento);
    document.getElementById('nacionalidad_huesped').addEventListener('blur', validateNacionalidad);
    document.getElementById('nombre_huesped').addEventListener('blur', validateNombre);
    document.getElementById('apellido_huesped').addEventListener('blur', validateApellido);
    document.getElementById('telefono_huesped').addEventListener('blur', validateTelefono);
    
    // Clear errors when user starts typing
    document.getElementById('id_doc_huesped').addEventListener('input', function() {
        if (this.value.trim() !== '') {
            hideFieldError('id_doc_huesped');
        }
    });
    
    document.getElementById('nacionalidad_huesped').addEventListener('input', function() {
        if (this.value.trim() !== '') {
            hideFieldError('nacionalidad_huesped');
        }
    });
    
    document.getElementById('nombre_huesped').addEventListener('input', function() {
        if (this.value.trim() !== '') {
            hideFieldError('nombre_huesped');
        }
    });
    
    document.getElementById('apellido_huesped').addEventListener('input', function() {
        if (this.value.trim() !== '') {
            hideFieldError('apellido_huesped');
        }
    });
    
    document.getElementById('telefono_huesped').addEventListener('input', function() {
        if (this.value.trim() !== '') {
            hideFieldError('telefono_huesped');
        }
    });
    
    // Form submission validation
    form.addEventListener('submit', function(e) {
        e.preventDefault();
        
        clearAllErrors();
        
        // Validate all required fields
        const isIdValid = validateIdDocumento();
        const isNacionalidadValid = validateNacionalidad();
        const isNombreValid = validateNombre();
        const isApellidoValid = validateApellido();
        const isTelefonoValid = validateTelefono();
        
        // Check if tipo_doc_huesped has a value (it should always have one since it's a select)
        const tipoDoc = document.getElementById('tipo_doc_huesped').value;
        if (!tipoDoc) {
            // This shouldn't happen with your select, but just in caselet isTipoDocValid = true;
            isTipoDocValid = false;
        }
        
        // If all validations pass, submit the form
        if (isIdValid && isNacionalidadValid && isNombreValid && isApellidoValid && isTelefonoValid && isTipoDocValid) {
            this.submit();
        }
    });
});
</script> 