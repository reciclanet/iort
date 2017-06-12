@extends('layouts.app')

@section('content')
  <div>
    {{ $persona }}
    @if ($persona->tipoConocido)
      {{ $persona->tipoConocido->nombre }}
    @endif
    @if ($persona->tipoAlta)
      {{ $persona->tipoAlta->nombre }}
    @endif
    @if ($persona->sexo)
      {{ $persona->sexo->nombre }}
    @endif
    @if ($persona->organizacion)
      {{ $persona->organizacion->razon_social }}
    @endif
  </div>
  <a href="{{ url('personas/' . $persona->id . '/edit')}}" class="btn btn-primary">Editar</a>
@endsection
