@extends('layouts.app')

@section('content')
  <h1>Organizaciones</h1>
  <ul>
    @foreach ($organizaciones as $organizacion)
      <li><a href="/organizaciones/{{ $organizacion->id }}">{{ $organizacion->razon_social }}</a></li>
    @endforeach
  </ul>
@endsection
