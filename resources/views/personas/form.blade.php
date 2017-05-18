
{{ csrf_field() }}

 <div class="form-group row {{ $errors->has('nombre') ? 'error' : '' }}">
   <label for="nombre" class="col-sm-2 col-form-label">Nombre</label>
   <div class="col-sm-10">
     {{ Form::text('nombre')}}
    </div>
 </div>
 <div class="form-group row {{ $errors->has('apellido_1') ? 'error' : '' }}">
    <label for="apellido_1" class="col-sm-2 col-form-label">Apellido 1</label>
    <div class="col-sm-10">
    <input type="text" class="form-control" id="apellido_1" name="apellido_1"
      value="{{ $persona->apellido_1 or old('apellido_1') }}" placeholder="Apellido 1" />
    </div>
  </div>
  <div class="form-group row {{ $errors->has('apellido_2') ? 'error' : '' }}">
     <label for="apellido_2" class="col-sm-2 col-form-label">Apellido 2</label>
     <div class="col-sm-10">
     <input type="text" class="form-control" id="apellido_2" name="apellido_2"
      value="{{ $persona->apellido_2 or old('apellido_2') }}" placeholder="Apellido 2" />
    </div>
   </div>
   <div class="form-group row {{ $errors->has('fecha_nacimiento') ? 'error' : '' }}">
      <label for="fecha_nacimiento" class="col-sm-3 col-form-label">Fecha de nacimiento</label>
      <div class="col-sm-4">
      <input type="date" class="form-control" id="fecha_nacimiento" name="fecha_nacimiento"
       value="{{ $persona->fecha_nacimiento or old('fecha_nacimiento') }}" placeholder="Fecha de nacimiento" />
     </div>
    </div>
   <div class="form-group row {{ $errors->has('cargo') ? 'error' : '' }}">
      <label for="cargo" class="col-sm-2 col-form-label">Cargo</label>
      <div class="col-sm-10">
      <input type="text" class="form-control" id="cargo" name="cargo"
       value="{{ $persona->cargo or old('cargo') }}" placeholder="Cargo" />
     </div>
    </div>
   <div class="form-group row {{ $errors->has('sexo_id') ? 'error' : '' }}">
      <label for="sexo_id" class="col-sm-2 col-form-label">Sexo</label>
      <div class="col-sm-10">
      <input type="text" class="form-control" id="sexo_id" name="sexo_id"
       value="{{ $persona->sexo_id or old('sexo_id') }}" placeholder="Sexo" />
     </div>
    </div>
   <div class="form-group row {{ $errors->has('direccion') ? 'error' : '' }}">
      <label for="direccion" class="col-sm-2 col-form-label">Dirección</label>
      <div class="col-sm-10">
      <input type="text" class="form-control" id="direccion" name="direccion"
       value="{{ $persona->direccion or old('direccion') }}" placeholder="Dirección" />
     </div>
    </div>
   <div class="form-group row {{ $errors->has('cp') ? 'error' : '' }}">
      <label for="cp" class="col-sm-2 col-form-label">CP.</label>
      <div class="col-sm-10">
      <input type="text" class="form-control" id="cp" name="cp"
       value="{{ $persona->cp or old('cp') }}" placeholder="CP." />
     </div>
    </div>
   <div class="form-group row {{ $errors->has('poblacion') ? 'error' : '' }}">
      <label for="poblacion" class="col-sm-2 col-form-label">Población</label>
      <div class="col-sm-10">
      <input type="text" class="form-control" id="poblacion" name="poblacion"
       value="{{ $persona->poblacion or old('poblacion') }}" placeholder="Población" />
     </div>
    </div>
   <div class="form-group row {{ $errors->has('provincia') ? 'error' : '' }}">
      <label for="provincia" class="col-sm-2 col-form-label">Provincia</label>
      <div class="col-sm-10">
      <input type="text" class="form-control" id="provincia" name="provincia"
       value="{{ $persona->provincia or old('provincia') }}" placeholder="Provincia" />
     </div>
    </div>
   <div class="form-group row {{ $errors->has('email') ? 'error' : '' }}">
      <label for="email" class="col-sm-2 col-form-label">Email</label>
      <div class="col-sm-10">
      <input type="email" class="form-control" id="email" name="email"
       value="{{ $persona->email or old('email') }}" placeholder="Email" />
     </div>
    </div>
   <div class="form-group row {{ $errors->has('telefono_1') ? 'error' : '' }}">
      <label for="telefono_1" class="col-sm-2 col-form-label">Teléfono 1</label>
      <div class="col-sm-10">
      <input type="text" class="form-control" id="telefono_1" name="telefono_1"
       value="{{ $persona->telefono_1 or old('telefono_1') }}" placeholder="Teléfono 1" />
     </div>
    </div>
   <div class="form-group row {{ $errors->has('telefono_2') ? 'error' : '' }}">
      <label for="telefono_2" class="col-sm-2 col-form-label">Teléfono 2</label>
      <div class="col-sm-10">
      <input type="text" class="form-control" id="telefono_2" name="telefono_2"
       value="{{ $persona->telefono_2 or old('telefono_2') }}" placeholder="Teléfono 2" />
     </div>
    </div>
   <div class="form-group row {{ $errors->has('pagina_web') ? 'error' : '' }}">
      <label for="pagina_web" class="col-sm-2 col-form-label">Página Web</label>
      <div class="col-sm-10">
      <input type="url" class="form-control" id="pagina_web" name="pagina_web"
       value="{{ $persona->pagina_web or old('pagina_web') }}" placeholder="Página Web" />
     </div>
    </div>
   <div class="form-group row {{ $errors->has('tipo_conocido_id') ? 'error' : '' }}">
      <label for="tipo_conocido_id" class="col-sm-2 col-form-label">¿Cómo nos has conocido?</label>
      <div class="col-sm-10">
        {{ Form::select('tipo_conocido_id', $tipos_conocido, null, ['class'=>"form-control", 'placeholder' => ''])}}
      </div>
    </div>
   <div class="form-group row {{ $errors->has('tipo_alta_id') ? 'error' : '' }}">
      <label for="tipo_alta_id" class="col-sm-2 col-form-label">Tipo de alta</label>
      <div class="col-sm-10">
        <div class="col-sm-10">
          {{ Form::select('tipo_alta_id', $tipos_alta, null, ['class'=>"form-control", 'placeholder' => ''])}}
        </div>
     </div>
    </div>
   <div class="form-group row {{ $errors->has('organizacion_id') ? 'error' : '' }}">
      <label for="organizacion_id" class="col-sm-2 col-form-label">Organización</label>
      <div class="col-sm-10">
      <input type="text" class="form-control" id="organizacion_id" name="organizacion_id"
       value="{{ $persona->organizacion_id or old('organizacion_id') }}" placeholder="Organización" />
     </div>
    </div>

 <button type="submit" class="btn btn-primary">Submit</button>

@include ('layouts.errors')
