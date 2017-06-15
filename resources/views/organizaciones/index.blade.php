@extends('layouts.app')

@section('content')
  <h1>Organizaciones</h1>
  <a href="{{ url('organizaciones/create')}}" class="btn btn-primary">Nueva</a>
  <div>
    <ul>
      @foreach ($organizaciones as $organizacion)
        <li><a href="/organizaciones/{{ $organizacion->id }}">{{ $organizacion->razon_social }}</a></li>
      @endforeach
    </ul>
  </div>
@endsection
