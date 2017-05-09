@extends('layouts.app')

@section('content')

<h1>Editar</h1>
<form method="PATCH" action="/personas/{{ $persona->id }}" >
  @include('personas/form')
</form>
@endsection
