@extends('layouts.app')

@section('content')

<h1>Lote</h1>

{!! Form::model($lote, ['action' => ['LoteController@update', $lote->id], 'method' => 'PATCH']) !!}
  @include('lotes/form')

  @include ('lote_material.index')

  <button type="submit" class="btn btn-primary">Guardar</button>

{!! Form::close() !!}
@endsection
