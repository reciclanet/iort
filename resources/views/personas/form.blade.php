
{{ csrf_field() }}

 <div class="form-group">
   <label for="nombre">Nombre</label>
   <input type="text" class="form-control" id="nombre" name="nombre"
    value="{{ $persona->nombre or old('nombre') }}" placeholder="Nombre" />
 </div>
 <div class="form-group">
    <label for="apellido_1">Apellido 1</label>
    <input type="text" class="form-control" id="apellido_1" name="apellido_1"
      value="{{ $persona->apellido_1 or old('apellido_1') }}" placeholder="Apellido 1" />
  </div>
  <div class="form-group">
     <label for="apellido_2">Apellido 2</label>
     <input type="text" class="form-control" id="apellido_2" name="apellido_2"
      value="{{ $persona->apellido_2 or old('apellido_2') }}" placeholder="Apellido 2" />
   </div>

 <button type="submit" class="btn btn-default">Submit</button>
