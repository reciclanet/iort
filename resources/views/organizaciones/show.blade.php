@extends('layouts.app')

@section('content')
  <div class="col-sm-6">
    <h1>Datos Persona</h1>
    <dl class="dl-horizontal">
      <dt>Razón Social:</dt>
      <dd>{{ $organizacion->razon_social }}</dd>
      <dt>Actividad Principal:</dt>
      <dd>{{ $organizacion->actividad_principal }}</dd>
      <dt>NIF:</dt>
      <dd>{{ $organizacion->cif_nif }}</dd>
      <dt>Forma jurídica:</dt>
      <dd>
        @if ($organizacion->forma_juridica)
          {{ $organizacion->forma_juridica->nombre }}
        @endif
      </dd>
      <dt>Dirección:</dt>
      <dd>{{ $organizacion->direccion }}</dd>
      <dt>CP:</dt>
      <dd>{{ $organizacion->cp }}</dd>
      <dt>Población:</dt>
      <dd>{{ $organizacion->poblacion }}</dd>
      <dt>Provincia:</dt>
      <dd>
        @if ($organizacion->provincia)
          {{ $organizacion->provincia->nombre }}
        @endif
      </dd>
      <dt>Teléfono 1:</dt>
      <dd>{{ $organizacion->telefono_1 }}</dd>
      <dt>Teléfono 2:</dt>
      <dd>{{ $organizacion->telefono_2 }}</dd>
      <dt>Email:</dt>
      <dd>{{ $organizacion->email }}</dd>
      <dt>Página Web:</dt>
      <dd>{{ $organizacion->pagina_web }}</dd>
      <dt>¿Autoriza logo?:</dt>
      <dd>
        @if ($organizacion->autoriza_logo)
          {{ "Sí" }}
        @else
          {{ "No" }}
        @endif
      </dd>
    </dl>
  </div>
  <div class="col-sm-6">
    <h2>Lotes</h2>
    <ul>
      @foreach ($organizacion->lotes as $lote)
        <li><a href="{{ url('lotes/' . $lote->id )}}">{{ $lote->created_at->format('d/m/Y') . ' - ' . $lote->descripcion }}</a></li>
      @endforeach
    </ul>
  </div>

  <div style="clear:both;">
    <div class="col-sm-6">
      <a href="{{ url('organizaciones/' . $organizacion->id . '/edit')}}" class="btn btn-primary">Editar</a>
    </div>
    <div class="col-sm-6">
      {!! Form::model($organizacion, ['action' => ['LoteController@store', 'organizacion',$organizacion]]) !!}
        <button type="submit" class="btn btn-primary">Nuevo</button>
      {!! Form::close() !!}
    </div>
  </div>
@endsection
