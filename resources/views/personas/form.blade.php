
{{ csrf_field() }}

 <div class="form-group {{ $errors->has('nombre') ? 'error' : '' }}">
   <label for="nombre">Nombre</label>
   <input type="text" class="form-control" id="nombre" name="nombre"
    value="{{ $persona->nombre or old('nombre') }}" placeholder="Nombre" required />
 </div>
 <div class="form-group {{ $errors->has('apellido_1') ? 'error' : '' }}">
    <label for="apellido_1">Apellido 1</label>
    <input type="text" class="form-control" id="apellido_1" name="apellido_1"
      value="{{ $persona->apellido_1 or old('apellido_1') }}" placeholder="Apellido 1" />
  </div>
  <div class="form-group {{ $errors->has('apellido_2') ? 'error' : '' }}">
     <label for="apellido_2">Apellido 2</label>
     <input type="text" class="form-control" id="apellido_2" name="apellido_2"
      value="{{ $persona->apellido_2 or old('apellido_2') }}" placeholder="Apellido 2" />
   </div>
   <div class="form-group {{ $errors->has('fecha_nacimiento') ? 'error' : '' }}">
      <label for="fecha_nacimiento">Fecha de nacimiento</label>
      <input type="date" class="form-control" id="fecha_nacimiento" name="fecha_nacimiento"
       value="{{ $persona->fecha_nacimiento or old('fecha_nacimiento') }}" placeholder="Fecha de nacimiento" />
    </div>
   <div class="form-group {{ $errors->has('cargo') ? 'error' : '' }}">
      <label for="cargo">Cargo</label>
      <input type="text" class="form-control" id="cargo" name="cargo"
       value="{{ $persona->cargo or old('cargo') }}" placeholder="Cargo" />
    </div>
   <div class="form-group {{ $errors->has('sexo_id') ? 'error' : '' }}">
      <label for="sexo_id">Sexo</label>
      <input type="text" class="form-control" id="sexo_id" name="sexo_id"
       value="{{ $persona->sexo_id or old('sexo_id') }}" placeholder="Sexo" />
    </div>
   <div class="form-group {{ $errors->has('direccion') ? 'error' : '' }}">
      <label for="direccion">Dirección</label>
      <input type="text" class="form-control" id="direccion" name="direccion"
       value="{{ $persona->direccion or old('direccion') }}" placeholder="Dirección" />
    </div>
   <div class="form-group {{ $errors->has('cp') ? 'error' : '' }}">
      <label for="cp">CP.</label>
      <input type="text" class="form-control" id="cp" name="cp"
       value="{{ $persona->cp or old('cp') }}" placeholder="CP." />
    </div>
   <div class="form-group {{ $errors->has('poblacion') ? 'error' : '' }}">
      <label for="poblacion">Población</label>
      <input type="text" class="form-control" id="poblacion" name="poblacion"
       value="{{ $persona->poblacion or old('poblacion') }}" placeholder="Población" />
    </div>
   <div class="form-group {{ $errors->has('provincia') ? 'error' : '' }}">
      <label for="provincia">Provincia</label>
      <input type="text" class="form-control" id="provincia" name="provincia"
       value="{{ $persona->provincia or old('provincia') }}" placeholder="Provincia" />
    </div>
   <div class="form-group {{ $errors->has('email') ? 'error' : '' }}">
      <label for="email">Email</label>
      <input type="email" class="form-control" id="email" name="email"
       value="{{ $persona->email or old('email') }}" placeholder="Email" />
    </div>
   <div class="form-group {{ $errors->has('telefono_1') ? 'error' : '' }}">
      <label for="telefono_1">Teléfono 1</label>
      <input type="text" class="form-control" id="telefono_1" name="telefono_1"
       value="{{ $persona->telefono_1 or old('telefono_1') }}" placeholder="Teléfono 1" />
    </div>
   <div class="form-group {{ $errors->has('telefono_2') ? 'error' : '' }}">
      <label for="telefono_2">Teléfono 2</label>
      <input type="text" class="form-control" id="telefono_2" name="telefono_2"
       value="{{ $persona->telefono_2 or old('telefono_2') }}" placeholder="Teléfono 2" />
    </div>
   <div class="form-group {{ $errors->has('pagina_web') ? 'error' : '' }}">
      <label for="pagina_web">Página Web</label>
      <input type="url" class="form-control" id="pagina_web" name="pagina_web"
       value="{{ $persona->pagina_web or old('pagina_web') }}" placeholder="Página Web" />
    </div>
   <div class="form-group {{ $errors->has('tipo_conocido_id') ? 'error' : '' }}">
      <label for="tipo_conocido_id">¿Cómo nos has conocido?</label>
      <input type="text" class="form-control" id="tipo_conocido_id" name="tipo_conocido_id"
       value="{{ $persona->tipo_conocido_id or old('tipo_conocido_id') }}" placeholder="Conocido" />
    </div>
   <div class="form-group {{ $errors->has('tipo_alta_id') ? 'error' : '' }}">
      <label for="tipo_alta_id">Tipo de alta</label>
      <input type="text" class="form-control" id="tipo_alta_id" name="tipo_alta_id"
       value="{{ $persona->tipo_alta_id or old('tipo_alta_id') }}" placeholder="Tipo de alta" />
    </div>
   <div class="form-group {{ $errors->has('organizacion_id') ? 'error' : '' }}">
      <label for="organizacion_id">Organización</label>
      <input type="text" class="form-control" id="organizacion_id" name="organizacion_id"
       value="{{ $persona->organizacion_id or old('organizacion_id') }}" placeholder="Organización" />
    </div>

 <button type="submit" class="btn btn-primary">Submit</button>

@include ('layouts.errors')
