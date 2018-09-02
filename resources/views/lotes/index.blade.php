@extends('layouts.app')

@section('content')
  <h1>Lotes</h1>
  <div>
    <table class="table">
        <thead>
            <tr>
              <th>Id</th>
              <th>Fecha</th>
              <th>Tipo</th>
              <th>Descripción</th>
              <th>Responsable</th>
            </tr>
        </thead>
        <tbody>
          @foreach ($lotes as $lote)
            <tr>
              <td><a href="{{ url('lotes/' . $lote->id ) }}">{{ $lote->id }}</a></td>
              <td>{{ $lote->fecha->format('d/m/Y') }}</td>
              <td>{{ $lote->tipoLote->nombre }}</td>
              <td>{{ $lote->descripcion }}</td>
              <td>{{ $lote->responsable->getNombreDescriptivo() }}</td>
            </tr>
          @endforeach
        </tbody>
    </table>
    {{ $lotes->links() }}
  </div>
@endsection
