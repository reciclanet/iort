@extends('layouts.app')

@section('content')

<h1>Editar</h1>

{!! Form::model($organizacion, ['action' => ['OrganizacionController@update', $organizacion->id], 'method' => 'PATCH', 'files'=>true]) !!}
  @include('organizaciones/form')
{!! Form::close() !!}

@endsection
