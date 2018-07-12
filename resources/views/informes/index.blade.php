@extends('layouts.app')

@section('content')
  <h1>Informes</h1>

  <div>
    <div>
      <ul>
        <li>
          <a href="{{ url('informes/export?type=anio')}}" class="btn btn-primary">Sumatorio de materiales desde inicio de año</a>
        </li>
        <li>
          <a href="{{ url('informes/export?type=mes')}}" class="btn btn-primary">Sumatorio de materiales por mes</a>
        </li>
        <li>
          <a href="{{ url('informes/export?type=logos')}}" class="btn btn-primary">Colaboradores Sin Logo</a>
        </li>
      </ul>
    </div>
  </div>
@endsection
