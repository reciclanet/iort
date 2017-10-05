<div id="loteMaterialIndex">
  <h3 class="col-md-12">Lote material</h3>
  <div>
    <table class="table">
      <thead>
        <tr>
          <th>Material</th>
          <th>Código</th>
          <th>¿Borrado Seguro?</th>
          @if (isset($edicion) && $edicion)
            <th></th>
          @endif
        </tr>
      </thead>
      <tbody>
        @foreach ($lote->materiales as $loteMaterial)
          <tr id="loteMaterial{{$loteMaterial->material_id}}">
            <td>{{ $loteMaterial->material->nombre }}</td>
            <td>{{ $loteMaterial->codigo }}</td>
            <td>{{ ($loteMaterial->borrado_seguro)? 'Sí' : 'No' }}</td>
            @if (isset($edicion) && $edicion)
              <td>
                <button type="submit" class="btn btn-danger delete-loteMaterial" value="{{$loteMaterial->id}}">Eliminar</button>
              </td>
            @endif
          </tr>
        @endforeach
      </tbody>
      @if (isset($edicion) && $edicion)
        <tfoot>
          <tr>
            <th>Material</th>
            <th>Cantidad</th>
            <th>¿Borrado Seguro?</th>
            @if (isset($edicion) && $edicion)
              <th></th>
            @endif
          </tr>
          <tr>
            <td>{{ Form::select('material_id', $materiales, null, ['class'=>"form-control", 'placeholder' => ''])}}</td>
            <td>{{ Form::number('cantidad', null, ['class' =>"form-control"] )}}</td>
            <td>{{ Form::checkbox('borrado_seguro', 1, null)}}</td>
            <td><button type="submit" class="btn btn-success add-loteMaterial">Añadir</button></td>
          </tr>
        </tfoot>
      @endif
    </table>
  </div>
</div>
<script>
function cargarBotonesEliminar(){
  $(".delete-loteMaterial").each(function(index, item){
    $(this).unbind("click");
    $(this).on("click", function(event){
      event.preventDefault();
      $.ajax({
        type: "DELETE",
        url: "{{ url('loteMaterial/')}}/" + $(this).attr('value'),
        dataType: "json",
        success: function(data){
          if (data && data.success){
            $('#loteMaterialIndex').html(data.html);
            cargarBotonesEliminar();
          } else {
            alert(data.message);
          }
        }
      });
    });
  });
}

jQuery(document).ready(function($) {
    var url = "/lotes/{{$lote->id}}/" ;
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $(".add-loteMaterial").each(function(index, item){
      $(this).unbind("click");
      $(this).on("click", function(event){
        event.preventDefault();
        var formData = {
                lote_id: {{ $lote->id }},
                material_id: $('select[name=material_id]').val(),
                cantidad: $('input[name=cantidad]').val(),
                borrado_seguro: $('input[name=borrado_seguro]').is(":checked")
            }
            console.log(formData);
        $.ajax({
          type: "POST",
          url: "{{ url('loteMaterial')}}",
          dataType: "json",
          data: formData,
          success: function(data){
            if (data && data.success){
              $('#loteMaterialIndex').html(data.html);
              cargarBotonesEliminar();
              $('select[name=material_id]').val('');
              $('input[name=cantidad]').val('')
              $('input[name=borrado_seguro]').prop('checked', false);
            } else {
              alert(data.message);
            }
          }
        });
      });
    });

    cargarBotonesEliminar();
  });
</script>
