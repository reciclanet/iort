
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
          <th></th>
        </tr>
      </thead>
      <tbody>
        @foreach ($lote->materiales as $material)
          <tr>
            <td>{{ $material->material->nombre }}</td>
            <td>{{ $material->cantidad }}</td>
            <td>{{ ($material->borrado_seguro)? 'Sí' : 'No' }}</td>
            <td>
              <button type="submit" class="btn btn-warning">Editar</button>
              <button type="submit" class="btn btn-danger">Eliminar</button>
            </td>
          </tr>
        @endforeach
      </tbody>
      <tfoot>
        <tr>
          <td>{{ Form::select('material_id', $materiales, null, ['class'=>"form-control", 'placeholder' => ''])}}</td>
          <td>{{ Form::number('cantidad', null, ['class' =>"form-control"] )}}</td>
          <td>{{ Form::checkbox('borrado_seguro', 1, null)}}</td>
          <td><button type="submit" class="btn btn-success">Añadir</button></td>
        </tr>
      </tfoot>
    </table>
  </div>


</div>

<button type="submit" class="btn btn-primary">Guardar</button>
