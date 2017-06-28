@extends('layouts.app')

@section('content')
  <div class="col-sm-12">
    <h1>Datos Lote</h1>
    <dl class="dl-horizontal">
      <dt>Descripcion:</dt>
      <dd>{{ $lote->descripcion }}</dd>
    </dl>
  </div>

  @include ('lote_material.index')

  <div style="clear:both;">
    <div class="col-sm-6">
      <a href="{{ url('lotes/' . $lote->id . '/edit')}}" class="btn btn-primary">Editar</a>
    </div>
    <div class="col-sm-6">

    </div>
  </div>
@endsection
