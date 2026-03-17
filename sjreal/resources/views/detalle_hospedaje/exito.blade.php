@foreach ($huespedes as $huesped)
    @foreach ($huesped as $attribute)
        {{$attribute}}
    @endforeach
@endforeach