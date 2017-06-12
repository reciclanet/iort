@extends('layouts.app')

@section('content')
  <h1>Personas</h1>
  <a href="{{ url('personas/create')}}" class="btn btn-primary">Nueva</a>
  <div>
    <ul>
      @foreach ($personas as $persona)
        <li><a href="/personas/{{ $persona->id }}">{{ $persona->nombre }}</a></li>
      @endforeach
    </ul>
  </div>
@endsection
