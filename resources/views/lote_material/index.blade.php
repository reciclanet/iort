<h3>Lote material</h3>
<div>
  <table class="table">
    <thead>
      <tr>
        <th>Material</th>
        <th>Cantidad</th>
        <th>¿Borrado Seguro?</th>
        @if (isset($edicion) && $edicion)
          <th></th>
        @endif
      </tr>
    </thead>
    <tbody>
      @foreach ($lote->materiales as $material)
        <tr>
          <td>{{ $material->material->nombre }}</td>
          <td>{{ $material->cantidad }}</td>
          <td>{{ ($material->borrado_seguro)? 'Sí' : 'No' }}</td>
          @if (isset($edicion) && $edicion)
            <td>
              <button type="submit" class="btn btn-warning">Editar</button>
              <button type="submit" class="btn btn-danger">Eliminar</button>
            </td>
          @endif
        </tr>
      @endforeach
    </tbody>
    @if (isset($edicion) && $edicion)
      <tfoot>
        <tr>
          <td>{{ Form::select('material_id', $materiales, null, ['class'=>"form-control", 'placeholder' => ''])}}</td>
          <td>{{ Form::number('cantidad', null, ['class' =>"form-control"] )}}</td>
          <td>{{ Form::checkbox('borrado_seguro', 1, null)}}</td>
          <td><button type="submit" class="btn btn-success">Añadir</button></td>
        </tr>
      </tfoot>
    @endif
  </table>
</div>
