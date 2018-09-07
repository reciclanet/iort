@extends('layouts.app')

@section('content')

<h1>Lote</h1>

{!! Form::open(['action' => ['LoteController@store']]) !!}
  {{ Form::hidden('tipo', $tipo ) }}
  {{ Form::hidden('id', $id ) }}

  <div class="row">
    <div class="form-group">
      {{ Form::label('fecha', 'Fecha', ['class' =>"col-sm-offset-6 col-md-2"]) }}
      <div class="form-group col-md-4 {{ $errors->has('fecha') ? 'error' : '' }}">
        {{ Form::date('fecha', Carbon\Carbon::now(), ['class' =>"form-control"] )}}
      </div>
    </div>
    <div class="form-group">
      {{ Form::label('descripcion', 'Descripción', ['class' =>"col-md-2"]) }}
      <div class="form-group col-md-10  {{ $errors->has('descripcion') ? 'error' : '' }}">
        <input type="text" class="form-control" id="descripcion" placeholder="Descripción">
      </div>
    </div>
    <div class="form-group">
      {{ Form::label('tipo_lote_id', 'Tipo lote', ['class' =>"col-md-2"]) }}
      <div class="form-group col-md-4 {{ $errors->has('tipo_lote_id') ? 'error' : '' }}">
        {{ Form::select('tipo_lote_id', $tiposLote, 1, ['class'=>"form-control", 'placeholder' => ''])}}
      </div>
    </div>
</div>

<button type="submit" class="btn btn-primary">Guardar</button>
<a href="{{URL::previous()}}" class="btn btn-danger">Cancelar</a>

{!! Form::close() !!}

@endsection
