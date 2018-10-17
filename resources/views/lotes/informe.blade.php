@extends('layouts.informe')

@section('datos-personales')
		<table class="tablaDatosPersonales">
			<tr>
				<td colspan="2">
					<h2>Colaborador</h2>
				</td>
				<td colspan="2" style="text-align: right;">Fecha: {{ $lote->fecha->format('d/m/Y') }}</td>
			</tr>
			<tr class="borde">
				<td class="negrita">CONTACTO</td>
				<td colspan="3">{{ $lote->responsable->getNombreDescriptivo() }}</td>
			</tr>
			<tr class="borde">
				<td class="negrita">DIRECCIÓN</td>
				<td colspan="3"> {{ $lote->responsable->direccion }}</td>
			</tr>
			<tr class="borde">
				<td class="negrita">CP</td>
				<td>{{ $lote->responsable->cp }}</td>
				<td class="negrita">POBLACIÓN</td>
				<td>{{ $lote->responsable->poblacion }}</td>
			</tr>
			<tr class="borde">
				<td class="negrita">TELÉFONO 1</td>
				<td>{{ $lote->responsable->telefono_1 }}</td>
				<td class="negrita">TELÉFONO 2</td>
				<td>{{ $lote->responsable->telefono_2 }}</td>
			</tr>
			<tr class="borde">
				<td class="negrita">PÁGINA WEB</td>
				<td colspan="3">{{ $lote->responsable->pagina_web }}</td>
			</tr>
			<tr class="borde">
				<td class="negrita">EMAIL</td>
				<td colspan="3">{{ $lote->responsable->email }}</td>
			</tr>
		</table>
@endsection

@section('content')
	@include ('lote_material.informe')
@endsection
