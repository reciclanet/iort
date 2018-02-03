
@include ('layouts.errors')

<div class='row'>
  {{ Form::label('fecha', 'Fecha', ['class' =>"col-sm-offset-6 col-md-2"]) }}
  <div class="form-group col-md-4 {{ $errors->has('fecha') ? 'error' : '' }}">
    {{ Form::date('fecha', $lote->fecha, ['class' =>"form-control"] )}}
  </div>
  {{ Form::label('descripcion', 'Descripción', ['class' =>"col-md-2"]) }}
  <div class="form-group col-md-10  {{ $errors->has('descripcion') ? 'error' : '' }}">
    {{ Form::text('descripcion', null, ['class' =>"form-control"] )}}
  </div>
  {{ Form::label('tipo_lote_id', 'Tipo lote', ['class' =>"col-md-2"]) }}
  <div class="form-group col-md-4 {{ $errors->has('tipo_lote_id') ? 'error' : '' }}">
    {{ Form::select('tipo_lote_id', $tiposLote, null, ['class'=>"form-control", 'placeholder' => ''])}}
  </div>

  @include ('lote_material.index')

</div>

<button type="submit" class="btn btn-primary">Guardar</button>
