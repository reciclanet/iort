@extends('layouts.app')

@section('content')
  <div class="col-sm-6">
    <h1>Datos Persona</h1>
    <dl class="dl-horizontal">
      <dt>Fecha de alta:</dt>
      <dd>{{ $persona->created_at->toDateString() }}</dd>
      <dt>Nombre:</dt>
      <dd>{{ $persona->nombre }}</dd>
      <dt>Apellido 1:</dt>
      <dd>{{ $persona->apellido_1 }}</dd>
      <dt>Apellido 2:</dt>
      <dd>{{ $persona->apellido_2 }}</dd>
      <dt>Fecha de Nacimiento:</dt>
      <dd>{{ $persona->fecha_nacimiento }}</dd>
      <dt>Sexo:</dt>
      <dd>
        @if ($persona->sexo)
          {{ $persona->sexo->nombre }}
        @endif
      </dd>
      <dt>Dirección:</dt>
      <dd>{{ $persona->direccion }}</dd>
      <dt>CP:</dt>
      <dd>{{ $persona->cp }}</dd>
      <dt>Población:</dt>
      <dd>{{ $persona->poblacion }}</dd>
      <dt>Provincia:</dt>
      <dd>
        @if ($persona->provincia)
          {{ $persona->provincia->nombre }}
        @endif
      </dd>
      <dt>Teléfono 1:</dt>
      <dd>{{ $persona->telefono_1 }}</dd>
      <dt>Teléfono 2:</dt>
      <dd>{{ $persona->telefono_2 }}</dd>
      <dt>Email:</dt>
      <dd>{{ $persona->email }}</dd>
      <dt>Página Web:</dt>
      <dd>{{ $persona->pagina_web }}</dd>
      <dt>¿Cómo nos has conocido?:</dt>
      <dd>
        @if ($persona->tipoConocido)
          {{ $persona->tipoConocido->nombre }}
        @endif
      </dd>
      <dt>Tipo de alta:</dt>
      <dd>
        @if ($persona->tipoAlta)
          {{ $persona->tipoAlta->nombre }}
        @endif
      </dd>
      <dt>Organización:</dt>
      <dd>
        @if ($persona->organizacion)
          {{ $persona->organizacion->razon_social }}
        @endif
      </dd>
      <dt>Cargo:</dt>
      <dd>{{ $persona->cargo }}</dd>
      <dt>Notas:</dt>
      <dd>{{ $persona->notas }}</dd>
    </dl>
  </div>
  <div class="col-sm-6">
    <h2>Lotes</h2>
    <ul>
      @foreach ($persona->lotes as $lote)
        <li><a href="{{ url('lotes/' . $lote->id )}}">{{ $lote->fecha->format('d/m/Y') . ' - ' . $lote->descripcion }}</a></li>
      @endforeach
    </ul>
  </div>
  <div style="clear:both;">
    <div class="col-sm-6">
      <a href="{{ url('personas/' . $persona->id . '/edit')}}" class="btn btn-primary">Editar</a>
    </div>
    <div class="col-sm-6">
      {!! Form::model($persona, ['action' => ['LoteController@store', get_class($persona), $persona->id ]]) !!}
        <button type="submit" class="btn btn-primary">Nuevo</button>
      {!! Form::close() !!}
    </div>
  </div>
@endsection
