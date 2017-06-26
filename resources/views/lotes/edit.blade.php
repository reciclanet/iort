@extends('layouts.app')

@section('content')

<h1>Lote</h1>

{!! Form::model($lote, ['action' => ['LoteController@update', $lote->id], 'method' => 'PATCH']) !!}
  @include('lotes/form')
{!! Form::close() !!}
@endsection
