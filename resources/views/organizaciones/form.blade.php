
@include ('layouts.errors')

<div class='row'>
  <label for="razon_social" class="col-md-2 col-form-label">Razón Social</label>
  <div class="form-group col-md-10  {{ $errors->has('razon_social') ? 'error' : '' }}">
    {{ Form::text('razon_social', null, ['class' =>"form-control"] )}}
  </div>

  <label for="actividad_principal" class="col-md-2 col-form-label">Actividad Principal</label>
  <div class="form-group col-md-10 {{ $errors->has('actividad_principal') ? 'error' : '' }}">
    {{ Form::text('actividad_principal', null, ['class' =>"form-control"] )}}
  </div>

  <label for="cif_nif" class="col-md-2 col-form-label">Cif/Nif</label>
  <div class="form-group col-md-10 {{ $errors->has('cif_nif') ? 'error' : '' }}">
    {{ Form::text('cif_nif', null, ['class' =>"form-control"] )}}
  </div>

  <label for="forma_juridica_id" class="col-md-2 col-form-label">Forma Jurídica</label>
  <div class="form-group col-md-10 {{ $errors->has('forma_juridica_id') ? 'error' : '' }}">
    {{ Form::text('forma_juridica_id', null, ['class' =>"form-control"] )}}
  </div>

  <label for="direccion" class="col-md-2 col-form-label">Dirección</label>
  <div class="form-group col-md-7 {{ $errors->has('direccion') ? 'error' : '' }}">
    {{ Form::text('direccion', null, ['class' =>"form-control"] )}}
  </div>

  <label for="cp" class="col-md-1 col-form-label">CP.</label>
  <div class="form-group col-md-2 {{ $errors->has('cp') ? 'error' : '' }}">
    {{ Form::number('cp', null, ['class' =>"form-control"] )}}
  </div>

  <label for="poblacion" class="col-md-2 col-form-label">Población</label>
  <div class="form-group col-md-4 {{ $errors->has('poblacion') ? 'error' : '' }}">
    {{ Form::text('poblacion', null, ['class' =>"form-control"] )}}
  </div>

  <label for="provincia" class="col-md-2 col-form-label">Provincia</label>
  <div class="form-group col-md-4 {{ $errors->has('provincia') ? 'error' : '' }}">
    {{ Form::select('provincia', $provincias, null, ['class'=>"form-control", 'placeholder' => ''])}}
  </div>

  <label for="telefono_1" class="col-md-2 col-form-label">Teléfono 1</label>
  <div class="form-group col-md-4 {{ $errors->has('telefono_1') ? 'error' : '' }}">
    {{ Form::text('telefono_1', null, ['class' =>"form-control"] )}}
  </div>

  <label for="telefono_2" class="col-md-2 col-form-label">Teléfono 2</label>
  <div class="form-group col-md-4 {{ $errors->has('telefono_2') ? 'error' : '' }}">
    {{ Form::text('telefono_2', null, ['class' =>"form-control"] )}}
  </div>

  <label for="email" class="col-md-2 col-form-label">Email</label>
  <div class="form-group col-md-10 {{ $errors->has('email') ? 'error' : '' }}">
    {{ Form::text('email', null, ['class' =>"form-control"] )}}
  </div>

  <label for="pagina_web" class="col-md-2 col-form-label">Página Web</label>
  <div class="form-group col-md-10 {{ $errors->has('pagina_web') ? 'error' : '' }}">
    {{ Form::text('pagina_web', null, ['class' =>"form-control"] )}}
  </div>

</div>

<button type="submit" class="btn btn-primary">Submit</button>
