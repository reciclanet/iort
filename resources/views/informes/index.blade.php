@extends('layouts.app')

@section('content')
  <h1>Informes</h1>

  <div>
    <div>
      <ul>
        @foreach ($informes as $informe)
          <li>
            <a href="{{ url('informes/' . $informe->id )}}" class="btn btn-primary">{{ $informe->nombre }}</a>
          </li>
        @endforeach
      </ul>
    </div>
  </div>
@endsection
