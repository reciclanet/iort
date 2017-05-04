@extends('layouts.app')

@section('content')
  <h1>Personas</h1>
  <ul>
    @foreach ($personas as $persona)
      <li><a href="/personas/{{ $persona->id }}">{{ $persona->nombre }}</a></li>
    @endforeach
  </ul>
@endsection
