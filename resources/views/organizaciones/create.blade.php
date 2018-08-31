@extends('layouts.app')

@section('content')

<h1>Create</h1>

{!! Form::open(['action' => ['OrganizacionController@store'], 'files'=>true]) !!}
  @include('organizaciones/form')
{!! Form::close() !!}

@endsection
