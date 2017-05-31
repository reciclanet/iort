@extends('layouts.app')

@section('content')

<h1>Create</h1>

{!! Form::open(['action' => ['OrganizacionesController@store']]) !!}
  @include('organizaciones/form')
{!! Form::close() !!}

@endsection
