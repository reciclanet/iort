
@include ('layouts.errors')

<div class='row'>
  {{ Form::label('nombre', 'Nombre', ['class' =>"col-md-2"]) }}
  <div class="form-group col-md-10  {{ $errors->has('nombre') ? 'error' : '' }}">
    {{ Form::text('nombre', null, ['class' =>"form-control"] )}}
  </div>

  {{ Form::label('apellido_1', 'Apellido 1', ['class' =>"col-md-2"]) }}
  <div class="form-group col-md-10 {{ $errors->has('apellido_1') ? 'error' : '' }}">
    {{ Form::text('apellido_1', null, ['class' =>"form-control"] )}}
  </div>

  {{ Form::label('apellido_2', 'Apellido 2', ['class' =>"col-md-2"]) }}
  <div class="form-group col-md-10 {{ $errors->has('apellido_2') ? 'error' : '' }}">
    {{ Form::text('apellido_2', null, ['class' =>"form-control"] )}}
  </div>

  {{ Form::label('fecha_nacimiento', 'F. Nacimiento', ['class' =>"col-md-2"]) }}
  <div class="form-group col-md-4 {{ $errors->has('fecha_nacimiento') ? 'error' : '' }}">
    {{ Form::date('fecha_nacimiento', null, ['class' =>"form-control"] )}}
  </div>

  {{ Form::label('sexo_id', 'Sexo', ['class' =>"col-md-2"]) }}
  <div class="form-group col-md-4 {{ $errors->has('sexo_id') ? 'error' : '' }}">
    {{ Form::select('sexo_id', $sexos, null, ['class'=>"form-control", 'placeholder' => ''])}}
  </div>

  {{ Form::label('direccion', 'Dirección', ['class' =>"col-md-2"]) }}
  <div class="form-group col-md-7 {{ $errors->has('direccion') ? 'error' : '' }}">
    {{ Form::text('direccion', null, ['class' =>"form-control"] )}}
  </div>

  {{ Form::label('cp', 'CP.', ['class' =>"col-md-1"]) }}
  <div class="form-group col-md-2 {{ $errors->has('cp') ? 'error' : '' }}">
    {{ Form::number('cp', null, ['class' =>"form-control"] )}}
  </div>

  {{ Form::label('poblacion', 'Población', ['class' =>"col-md-2"]) }}
  <div class="form-group col-md-4 {{ $errors->has('poblacion') ? 'error' : '' }}">
    {{ Form::text('poblacion', null, ['class' =>"form-control"] )}}
  </div>

  {{ Form::label('provincia', 'Provincia', ['class' =>"col-md-2"]) }}
  <div class="form-group col-md-4 {{ $errors->has('provincia') ? 'error' : '' }}">
    {{ Form::select('provincia', $provincias, null, ['class'=>"form-control", 'placeholder' => ''])}}
  </div>

  {{ Form::label('telefono_1', 'Teléfono 1', ['class' =>"col-md-2"]) }}
  <div class="form-group col-md-4 {{ $errors->has('telefono_1') ? 'error' : '' }}">
    {{ Form::text('telefono_1', null, ['class' =>"form-control"] )}}
  </div>

  {{ Form::label('telefono_2', 'Teléfono 2', ['class' =>"col-md-2"]) }}
  <div class="form-group col-md-4 {{ $errors->has('telefono_2') ? 'error' : '' }}">
    {{ Form::text('telefono_2', null, ['class' =>"form-control"] )}}
  </div>

  {{ Form::label('email', 'Email', ['class' =>"col-md-2"]) }}
  <div class="form-group col-md-10 {{ $errors->has('email') ? 'error' : '' }}">
    {{ Form::text('email', null, ['class' =>"form-control"] )}}
  </div>

  {{ Form::label('pagina_web', 'Página Web', ['class' =>"col-md-2"]) }}
  <div class="form-group col-md-10 {{ $errors->has('pagina_web') ? 'error' : '' }}">
    {{ Form::text('pagina_web', null, ['class' =>"form-control"] )}}
  </div>

  {{ Form::label('tipo_conocido_id', '¿Cómo nos has conocido?', ['class' =>"col-md-4"]) }}
  <div class="form-group col-md-3 {{ $errors->has('tipo_conocido_id') ? 'error' : '' }}">
    {{ Form::select('tipo_conocido_id', $tipos_conocido, null, ['class'=>"form-control", 'placeholder' => ''])}}
  </div>

  {{ Form::label('tipo_alta_id', 'Tipo de alta', ['class' =>"col-md-2"]) }}
  <div class="form-group col-md-3 {{ $errors->has('tipo_alta_id') ? 'error' : '' }}">
    {{ Form::select('tipo_alta_id', $tipos_alta, null, ['class'=>"form-control", 'placeholder' => ''])}}
  </div>

  {{ Form::label('organizacion_id', 'Organización', ['class' =>"col-md-2"]) }}
  <div class="form-group col-md-5 {{ $errors->has('organizacion_id') ? 'error' : '' }}">
    {{ Form::select('organizacion_id', $organizaciones, null, ['class'=>"form-control", 'placeholder' => ''])}}
  </div>

  {{ Form::label('cargo', 'Cargo', ['class' =>"col-md-2"]) }}
  <div class="form-group col-md-3 {{ $errors->has('cargo') ? 'error' : '' }}">
    {{ Form::text('cargo', null, ['class' =>"form-control"] )}}
  </div>

</div>

<button type="submit" class="btn btn-primary">Submit</button>
