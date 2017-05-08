@extends('layouts.app')

@section('content')

<h1>Editar</h1>
<form action="/personas/{{ $persona->id }}" method="POST">
  @include('personas/form')
</form>
@endsection
