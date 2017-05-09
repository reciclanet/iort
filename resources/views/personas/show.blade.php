@extends('layouts.app')

@section('content')
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
@endsection
