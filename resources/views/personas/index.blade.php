@extends('layouts.app')

@section('content')
  <h1>Personas</h1>
  <a href="{{ url('personas/create')}}" class="btn btn-primary">Nueva</a>

  <div>
    <table class="table">
      <thead>
        <tr>
          <th>#</th>
          <th>Nombre</th>
          <th>Apellido 1</th>
          <th>Apellido 2</th>
          <th>Población</th>
          <th>Teléfono 1</th>
          <th>Teléfono 2</th>
        </tr>
      </thead>
      <tbody>

      @foreach ($personas as $persona)
        <tr>
          <th scope="row">{{ $persona->id }}</th>
          <td><a href="/personas/{{ $persona->id }}">{{ $persona->nombre }}</a></td>
          <td>{{ $persona->apellido_1 }}</td>
          <td>{{ $persona->apellido_2 }}</td>
          <td>{{ $persona->poblacion }}</td>
          <td>{{ $persona->telefono_1 }}</td>
          <td>{{ $persona->telefono_2 }}</td>
        </tr>
      @endforeach
    </table>
  </div>

@endsection
