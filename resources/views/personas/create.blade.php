@extends('layouts.app')

@section('content')

<h1>Create</h1>
<form method="POST" action="/personas">
  @include('personas/form')
</form>

@endsection
