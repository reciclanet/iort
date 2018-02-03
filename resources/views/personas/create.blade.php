@extends('layouts.app')

@section('content')

<h1>Create</h1>

{!! Form::open(['action' => ['PersonasController@store']]) !!}
  @include('personas/form')
{!! Form::close() !!}
@include ('organizaciones.modals.create', ['submitTextButton' => 'Crear'])
@endsection
