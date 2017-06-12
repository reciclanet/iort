@extends('layouts.app')

@section('content')
  <div>
    {{ $organizacion }}
  </div>

  <a href="{{ url('organizaciones/' . $organizacion->id . '/edit')}}" class="btn btn-primary">Editar</a>
@endsection
