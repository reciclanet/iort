
@include ('layouts.errors')

<div class='row'>
  {{ Form::label('descripcion', 'Descripción', ['class' =>"col-md-2"]) }}
  <div class="form-group col-md-10  {{ $errors->has('descripcion') ? 'error' : '' }}">
    {{ Form::text('descripcion', null, ['class' =>"form-control"] )}}
  </div>

  {{ $edicion = true }}
  @include ('lote_material.index')


</div>

<button type="submit" class="btn btn-primary">Guardar</button>
