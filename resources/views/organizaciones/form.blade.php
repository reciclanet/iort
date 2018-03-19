
@include ('layouts.errors')

<div class='row'>
  {{ Form::label('razon_social', 'Razón Social', ['class' =>"col-md-2"]) }}
  <div class="form-group col-md-10  {{ $errors->has('razon_social') ? 'error' : '' }}">
    {{ Form::text('razon_social', null, ['class' =>"form-control"] )}}
  </div>

  {{ Form::label('actividad_principal', 'Actividad Principal', ['class' =>"col-md-2"]) }}
  <div class="form-group col-md-10 {{ $errors->has('actividad_principal') ? 'error' : '' }}">
    {{ Form::text('actividad_principal', null, ['class' =>"form-control"] )}}
  </div>

  {{ Form::label('cif_nif', 'Cif/Nif', ['class' =>"col-md-2"]) }}
  <div class="form-group col-md-10 {{ $errors->has('cif_nif') ? 'error' : '' }}">
    {{ Form::text('cif_nif', null, ['class' =>"form-control"] )}}
  </div>

  {{ Form::label('forma_juridica_id', 'Forma Jurídica', ['class' =>"col-md-2"]) }}
  <div class="form-group col-md-10 {{ $errors->has('forma_juridica_id') ? 'error' : '' }}">
    {{ Form::text('forma_juridica_id', null, ['class' =>"form-control"] )}}
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

  {{ Form::label('provincia_cod', 'Provincia', ['class' =>"col-md-2"]) }}
  <div class="form-group col-md-4 {{ $errors->has('provincia_cod') ? 'error' : '' }}">
    {{ Form::select('provincia_cod', $provincias, null, ['class'=>"form-control", 'placeholder' => ''])}}
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

  {{ Form::label('tipo_conocido_id', '¿Cómo nos has conocido?', ['class' =>"col-md-3"]) }}
  <div class="form-group col-md-3 {{ $errors->has('tipo_conocido_id') ? 'error' : '' }}">
    {{ Form::select('tipo_conocido_id', $tipos_conocido, null, ['class'=>"form-control", 'placeholder' => ''])}}
  </div>

  {{ Form::label('codigo', 'Código', ['class' =>"col-md-2"]) }}
  <div class="form-group col-md-4 {{ $errors->has('codigo') ? 'error' : '' }}">
    {{ Form::text('codigo', null, ['class' =>"form-control"] )}}
  </div>

  <div class="form-group">
    <div class="col-md-2 {{ $errors->has('autoriza_logo') ? 'error' : '' }}">
      {{ Form::checkbox('autoriza_logo', 1, null)}}
    </div>
    {{ Form::label('autoriza_logo', '¿AUTORIZO EL USO DEL LOGOTIPO DE LA EMPRESA PARA EL USO DE RECICLANET EN LA SECCIÓN DE COLABORADORES DE SU PÁGINA WEB?', ['class' =>"col-md-10"]) }}
  </div>

  {{ Form::label('logo', 'Logo', ['class' =>"col-md-2"]) }}
  {{ Form::hidden('logo') }}
  <div class="form-group col-md-10 {{ $errors->has('logo') ? 'error' : '' }}">
    {{ Form::file('logo_file', null, ['class' =>"form-control"] )}}
  </div>

  {{ Form::label('notas', 'Notas', ['class' =>"col-md-2"]) }}
  <div class="form-group col-md-10 {{ $errors->has('notas') ? 'error' : '' }}">
    {{ Form::text('notas', null, ['class' =>"form-control"] )}}
  </div>

  {{ Form::label('tags', 'Etiquetas', ['class' =>"col-md-2"]) }}
  <div class="form-group col-md-10 {{ $errors->has('tags') ? 'error' : '' }}">
    {{ Form::select('tags[]', $tags, null, ['id'=> 'tags', 'class' =>"form-control", 'multiple'] )}}
  </div>
</div>

<button type="submit" class="btn btn-primary">Guardar</button>
<a href="{{ URL::previous() }}" class="btn btn-danger">Cancelar</a>

@push('styles')
  <link href="{{ asset('css/select2.min.css') }}" rel="stylesheet">
@endpush

@push('scripts')
  <script src="{{ asset('js/select2.min.js') }}"></script>
  <script>
    $(function() {
        $('#tags').select2({
            placeholder: 'Intriduce las etiquetas que te interesen',
            tags: true,
            createTag: function(newTag) {
                return {
                    id: 'nuevo|' + newTag.term,
                    text: newTag.term
                };
            }
        });
    });
  </script>
@endpush
