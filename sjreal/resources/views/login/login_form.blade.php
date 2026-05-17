

@isset($errors)
    @foreach ($errors as $error)
        <p>{{ $error }}</p>
    @endforeach
@endisset
<form method="POST" action="{{ route('login') }}">
   @csrf 
    <label>correo</label>
    <input name="email"></input>

    <label>Contrasena</label>
    <input name="password"></input>

    <button type="submit">Enviar</button>
</form>