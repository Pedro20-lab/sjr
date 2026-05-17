@extends('dashboard')

@section('content')
<div class="">
	<div class="">
		<h1 class="title">Lista de hospedajes</h1>
	</div>

	<div class="">
		<form action="{{ route('booking.filter') }}" method="GET" class="">
			<h2>Buscar segun parametro</h2>
			<label>Parametro</label>
			<select name="parameter">
				<option value="ingreso_hospedaje">Ingreso</option>
				<option value="salida_hospedaje">Salida</option>
				<option value="empleado_id">Empleado</option>
				<option value="habitacion_id">Habitacion</option>
				<option value="estado_hospedaje">Estado</option>
			</select>
			<input name="value" type="text" placeholder="Valor del parametro">
			<button type="submit">Buscar</button>
		</form>
		
		<table class="">
			<thead class="">
				<tr>
					<th>ID</th>
					<th>Empleado</th>
					<th>Habitación</th>
					<th>Adultos</th>
					<th>Niños</th>
					<th>Noches</th>
					<th>Estado</th>
					<th>Ingreso</th>
					<th>Salida</th>
				</tr>
			</thead>
			<tbody>
				@forelse (($hospedajes ?? []) as $hospedaje)
					<tr>
						<td>{{ $hospedaje->id_hospedaje }}</td>
						<td>{{ $hospedaje->empleado_id }}</td>
						<td>{{ $hospedaje->habitacion_id }}</td>
						<td>{{ $hospedaje->cantidad_adultos }}</td>
						<td>{{ $hospedaje->cantidad_ninos }}</td>
						<td>{{ $hospedaje->noches_hospedaje }}</td>
						<td>{{ $hospedaje->estado_hospedaje }}</td>
						<td>{{ $hospedaje->ingreso_hospedaje }}</td>
						<td>{{ $hospedaje->salida_hospedaje }}</td>
					</tr>
				@empty
					<tr>
						<td colspan="9" class="">No hay hospedajes registrados.</td>
					</tr>
				@endforelse
			</tbody>
		</table>
	</div>
</div>
@endsection
