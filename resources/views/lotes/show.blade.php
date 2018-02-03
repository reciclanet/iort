@extends('layouts.app')

@section('content')
  <div class="col-sm-12">
    <h1>Datos Lote</h1>
    <dl class="dl-horizontal">
      <dt>Fecha:</dt>
      <dd>{{ $lote->fecha->format('d/m/Y') }}</dd>
      <dt>Descripcion:</dt>
      <dd>{{ $lote->descripcion }}</dd>
      <dt>Tipo:</dt>
      <dd>{{ $lote->tipoLote->nombre }}</dd>
    </dl>
  </div>

  @include ('lote_material.index_agrupado')

  <div style="clear:both;">
    <div class="col-sm-6">
      <a href="{{ url('lotes/' . $lote->id . '/edit')}}" class="btn btn-primary">Editar</a>
      <a href="{{ url('lotes/' . $lote->id . '/informe')}}" class="btn btn-primary" target="_blank">Imprimir</a>
    </div>
  </div>
@endsection
