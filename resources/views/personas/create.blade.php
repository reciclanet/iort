@extends('layouts.app')

@section('content')

<h1>Create</h1>
<form action="/personas/" method="POST">
  @include('personas/form')
</form>

@endsection
