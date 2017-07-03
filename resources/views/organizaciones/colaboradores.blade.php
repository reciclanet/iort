@extends('layouts.app')

@section('content')
  <h1>Colaboradores</h1>

  <div>
    @foreach ($organizaciones as $organizacion)
      @if ($organizacion->logo)
      <div class="col-sm-4">
        <a href="{{ $organizacion->pagina_web }}">
            <img src={{ '/images/logos/' . $organizacion->logo }} width="100%"/>
        </a>
      </div>
      @endif
    @endforeach
  </div>
@endsection
