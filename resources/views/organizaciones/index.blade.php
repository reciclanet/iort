@extends('layouts.app')

@section('content')
  <h1>Organizaciones</h1>
  <a href="{{ url('organizaciones/create')}}" class="btn btn-primary">Nueva</a>
  <div>
    <table class="table">
      <thead>
        <tr>
          <th>#</th>
          <th>Razón Social</th>
          <th>Población</th>
          <th>Teléfono 1</th>
          <th>Teléfono 2</th>
        </tr>
      </thead>
      <tbody>

      @foreach ($organizaciones as $organizacion)
        <tr>
          <th scope="row">{{ $organizacion->id }}</th>
          <td><a href="/organizaciones/{{ $organizacion->id }}">{{ $organizacion->razon_social }}</a></td>
          <td>{{ $organizacion->poblacion }}</td>
          <td>{{ $organizacion->telefono_1 }}</td>
          <td>{{ $organizacion->telefono_2 }}</td>
        </tr>
      @endforeach
    </table>
  </div>
@endsection
