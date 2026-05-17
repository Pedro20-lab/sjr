@extends('dashboard')

@section('content')
<div class="">
	<div class="">
		<h1 class="title">Pagos</h1>
	</div>

	<div class="">
		{{-- <form action="{{ route('booking.filter') }}" method="GET" class="">
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
		</form> --}}
		
		<table class="">
			<thead class="">
				<tr>
					<th>ID</th>
					<th>Total</th>
					<th>Fecha</th>
					<th>Cliente</th>
				</tr>
			</thead>
			<tbody>
				@forelse (($payments ?? []) as $payment)
					<tr>
						<td>{{ $payment->id_pago }}</td>
						<td>{{ $payment->monto_total }}</td>
						<td>{{ $payment->fecha_pago }}</td>
						<td>{{ $payment->cliente_id }}</td>
						
					</tr>
				@empty
					<tr>
						<td colspan="9" class="">No hay pagos registrados.</td>
					</tr>
				@endforelse
			</tbody>
		</table>
	</div>
</div>
@endsection
