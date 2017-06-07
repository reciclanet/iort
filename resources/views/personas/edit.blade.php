@extends('layouts.app')

@section('content')

<h1>Editar</h1>

{!! Form::model($persona, ['action' => ['PersonasController@update', $persona->id], 'method' => 'PATCH']) !!}
  @include('personas/form')
{!! Form::close() !!}
@include ('organizaciones.modals.create', ['submitTextButton' => 'Crear'])
@endsection
