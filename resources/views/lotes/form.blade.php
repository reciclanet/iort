
@include ('layouts.errors')

<div class='row'>
  {{ Form::label('descripcion', 'Descripción', ['class' =>"col-md-2"]) }}
  <div class="form-group col-md-10  {{ $errors->has('descripcion') ? 'error' : '' }}">
    {{ Form::text('descripcion', null, ['class' =>"form-control"] )}}
  </div>

  <h3>Lote material</h3>
  <div>
    <table class="table">
      <thead>
        <tr>
          <th>Material</th>
          <th>Cantidad</th>
          <th>¿Borrado Seguro?</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($lote->materiales as $material)
          <td>{{ $material->material->nombre }}</td>
          <td>{{ $material->cantidad }}</td>
          <td></td>
        @endforeach
      </tbody>
    </table>
  </div>


</div>

<button type="submit" class="btn btn-primary">Guardar</button>
