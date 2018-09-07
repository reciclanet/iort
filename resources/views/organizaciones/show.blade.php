@extends('layouts.app')

@section('content')
  <div class="col-sm-6">
    <h1>Datos Organización</h1>
    <dl class="dl-horizontal">
      <dt>Fecha de alta:</dt>
      <dd>{{ $organizacion->created_at->toDateString() }}</dd>
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
      <dt>¿Cómo nos has conocido?:</dt>
      <dd>
        @if ($organizacion->tipoConocido)
          {{ $organizacion->tipoConocido->nombre }}
        @endif
      </dd>
      <dt>Codigo:</dt>
      <dd>{{ $organizacion->codigo }}</dd>
      <dt>¿Autoriza logo?:</dt>
      <dd>
        @if ($organizacion->autoriza_logo)
          {{ "Sí" }}
        @else
          {{ "No" }}
        @endif
      </dd>
      <dt>Notas:</dt>
      <dd>{{ $organizacion->notas }}</dd>
      <dt>Etiquetas:</dt>
      <dd>
        @foreach ($organizacion->tags as $tag)
          <span class="label label-primary">{{ $tag->nombre }}</span>
        @endforeach
      </dd>
      <dt></dt>
      <dd>
        @if ($organizacion->logo)
          <img src={{ '/images/logos/' . $organizacion->logo }} width="200"/>
        @endif
      </dd>
    </dl>
  </div>
  <div class="col-sm-6">
    <h2>Lotes</h2>
    <ul>
      @foreach ($organizacion->lotes as $lote)
        <li><a href="{{ url("lotes/$lote->id" )}}">{{ $lote->created_at->format('d/m/Y') . ' - ' . $lote->descripcion }}</a></li>
      @endforeach
    </ul>
  </div>

  <div style="clear:both;">
    <div class="col-sm-6">
      <a href="{{ url("organizaciones/$organizacion->id/edit") }}" class="btn btn-primary">Editar</a>
    </div>
    <div class="col-sm-6">
      <a href="{{ action('LoteController@create').'?'.http_build_query(["tipo" => get_class($organizacion), "id" => $organizacion->id]) }}" class="btn btn-primary">Nuevo</a>
    </div>
  </div>
@endsection
