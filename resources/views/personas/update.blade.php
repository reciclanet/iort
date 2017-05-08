@extends('layouts.app')

@section('content')

<h1>Edit</h1>
<form action="/personas/{{ $persona->id }}" method="POST">
  @include('partials/form');
</form>
@endsection
