@extends('layouts.app')

@section('content')

<h1>Editar</h1>
<form method="POST" action="/personas/{{ $persona->id }}" >
  <input name="_method" type="hidden" value="PATCH">
  @include('personas/form')
</form>
@endsection
