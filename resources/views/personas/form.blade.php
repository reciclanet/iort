
{{ csrf_field() }}

<div class='row'>
  <label for="nombre" class="col-md-2 col-form-label">Nombre</label>
  <div class="form-group col-md-10  {{ $errors->has('nombre') ? 'error' : '' }}">
    {{ Form::text('nombre', null, ['class' =>"form-control"] )}}
  </div>
</div>
<div class='row'>
    <label for="apellido_1" class="col-md-2 col-form-label">Apellido 1</label>
      <div class="form-group col-md-10 {{ $errors->has('apellido_1') ? 'error' : '' }}">
    {{ Form::text('apellido_1', null, ['class' =>"form-control"] )}}
  </div>
</div>
<div class='row'>
    <label for="apellido_2" class="col-md-2 col-form-label">Apellido 2</label>
      <div class="form-group col-md-10 {{ $errors->has('apellido_2') ? 'error' : '' }}">
    {{ Form::text('apellido_2', null, ['class' =>"form-control"] )}}
  </div>
</div>
<div class='row'>
  <div class='col-sm-6'>
      <label for="fecha_nacimiento" class="col-md-5 col-form-label">F. Nacimiento</label>
        <div class="form-group col-md-7 {{ $errors->has('fecha_nacimiento') ? 'error' : '' }}">
      {{ Form::date('fecha_nacimiento', null, ['class' =>"form-control"] )}}
    </div>
  </div>
  <div class='col-sm-6'>
      <label for="sexo_id" class="col-md-2 col-form-label">Sexo</label>
        <div class="form-group col-md-6 {{ $errors->has('sexo_id') ? 'error' : '' }}">
      {{ Form::select('sexo_id', $sexos, null, ['class'=>"form-control", 'placeholder' => ''])}}
    </div>
  </div>
</div>
<div class='row'>
    <label for="direccion" class="col-md-2 col-form-label">Dirección</label>
      <div class="form-group col-md-10 {{ $errors->has('direccion') ? 'error' : '' }}">
    {{ Form::text('direccion', null, ['class' =>"form-control"] )}}
  </div>
</div>
<div class='row'>
    <label for="cp" class="col-md-2 col-form-label">CP.</label>
      <div class="form-group col-md-10 {{ $errors->has('cp') ? 'error' : '' }}">
    {{ Form::number('cp', null, ['class' =>"form-control"] )}}
  </div>
</div>
<div class='row'>
    <label for="poblacion" class="col-md-2 col-form-label">Población</label>
      <div class="form-group col-md-10 {{ $errors->has('poblacion') ? 'error' : '' }}">
    {{ Form::text('poblacion', null, ['class' =>"form-control"] )}}
  </div>
</div>
<div class='row'>
    <label for="provincia" class="col-md-2 col-form-label">Provincia</label>
      <div class="form-group col-md-10 {{ $errors->has('provincia') ? 'error' : '' }}">
    {{ Form::text('provincia', null, ['class' =>"form-control"] )}}
  </div>
</div>
<div class='row'>
    <label for="email" class="col-md-2 col-form-label">Email</label>
      <div class="form-group col-md-10 {{ $errors->has('email') ? 'error' : '' }}">
    {{ Form::text('email', null, ['class' =>"form-control"] )}}
  </div>
</div>
<div class='row'>
  <div class='col-sm-6'>
    <label for="telefono_1" class="col-md-4 col-form-label">Teléfono 1</label>
    <div class="form-group col-md-6 {{ $errors->has('telefono_1') ? 'error' : '' }}">
      {{ Form::text('telefono_1', null, ['class' =>"form-control"] )}}
    </div>
  </div>
  <div class='col-sm-6'>
    <label for="telefono_2" class="col-md-4 col-form-label">Teléfono 2</label>
    <div class="form-group col-md-6 {{ $errors->has('telefono_2') ? 'error' : '' }}">
      {{ Form::text('telefono_2', null, ['class' =>"form-control"] )}}
    </div>
  </div>
</div>
<div class='row'>
    <label for="pagina_web" class="col-md-2 col-form-label">Página Web</label>
      <div class="form-group col-md-10 {{ $errors->has('pagina_web') ? 'error' : '' }}">
    {{ Form::text('pagina_web', null, ['class' =>"form-control"] )}}
  </div>
</div>
<div class='row'>
  <div class='col-sm-7'>
    <label for="tipo_conocido_id" class="col-md-6 col-form-label">¿Cómo nos has conocido?</label>
      <div class="form-group col-md-6 {{ $errors->has('tipo_conocido_id') ? 'error' : '' }}">
        {{ Form::select('tipo_conocido_id', $tipos_conocido, null, ['class'=>"form-control", 'placeholder' => ''])}}
      </div>
  </div>
  <div class='col-sm-5'>
    <label for="tipo_alta_id" class="col-md-5 col-form-label">Tipo de alta</label>
    <div class="form-group col-md-7 {{ $errors->has('tipo_alta_id') ? 'error' : '' }}">
      {{ Form::select('tipo_alta_id', $tipos_alta, null, ['class'=>"form-control", 'placeholder' => ''])}}
    </div>
  </div>
</div>
<div class='row'>
  <div class="col-md-7">
    <label for="organizacion_id" class="col-md-3 col-form-label">Organización</label>
    <div class="form-group col-md-9 {{ $errors->has('organizacion_id') ? 'error' : '' }}">
      {{ Form::text('organizacion_id', null, ['class' =>"form-control"] )}}
    </div>
  </div>
  <div class='col-md-5'>
    <label for="cargo" class="col-md-3 col-form-label">Cargo</label>
    <div class="form-group col-md-9 {{ $errors->has('cargo') ? 'error' : '' }}">
      {{ Form::text('cargo', null, ['class' =>"form-control"] )}}
    </div>
  </div>
</div>

<button type="submit" class="btn btn-primary">Submit</button>

@include ('layouts.errors')
