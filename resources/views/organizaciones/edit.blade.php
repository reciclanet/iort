@extends('layouts.app')

@section('content')

<h1>Editar</h1>

{!! Form::model($organizacion, ['action' => ['OrganizacionesController@update', $organizacion->id], 'method' => 'PATCH']) !!}
  @include('organizaciones/form')
{!! Form::close() !!}

@endsection
