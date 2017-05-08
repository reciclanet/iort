@extends('layouts.app')

@section('content')
  {{ $persona }}
  {{ $persona->tipoConocido->nombre }}
  @if ($persona->tipoAlta)
    {{ $persona->tipoAlta->nombre }}
  @endif
  @if ($persona->sexo)
    {{ $persona->sexo->nombre }}
  @endif
  @if ($persona->organizacion)
    {{ $persona->organizacion->razon_social }}
  @endif
@endsection
