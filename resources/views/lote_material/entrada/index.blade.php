<div>
  <table class="table">
    <thead>
      <tr>
        <th>Material</th>
        <th>Código</th>
        <th>¿Borrado Seguro?</th>
        <th>TXAE</th>
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
          <td>{{ ($loteMaterial->txae)? 'Sí' : 'No' }}</td>
          @if (isset($edicion) && $edicion)
            <td>
              <button type="button" class="btn btn-danger delete-loteMaterial" value="{{$loteMaterial->id}}">Eliminar</button>
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
          <th>TXAE</th>
          <th></th>
        </tr>
        <tr>
          <td>{{ Form::select('material_id', $materiales, null, ['id'=> 'material', 'class'=>"form-control", 'placeholder' => ''])}}</td>
          <td>{{ Form::number('cantidad', null, ['class' =>"form-control"] )}}</td>
          <td>{{ Form::checkbox('borrado_seguro', 1, null)}}</td>
          <td>{{ Form::checkbox('txae', 1, null)}}</td>
          <td><button type="button" class="btn btn-success add-loteMaterial">Añadir</button></td>
        </tr>
      </tfoot>
    @endif
  </table>
  <div class="alert alert-danger print-error-msg" style="display:none">
    <ul></ul>
  </div>
</div>

@push('styles')
  <link href="{{ asset('css/select2.min.css') }}" rel="stylesheet">
@endpush

@push('scripts')
  <script src="{{ asset('js/select2.min.js') }}"></script>
  <script>
    function printErrorMsg (msg) {
      $(".print-error-msg").find("ul").html('');
      $(".print-error-msg").css('display','block');
      $.each( msg, function( key, value ) {
        $(".print-error-msg").find("ul").append('<li>'+value+'</li>');
      });
    }

    function cargarJavascriptElementos() {
      cargarBotonesAniadir();
      cargarBotonesEliminar();

      $('#material').select2({
          placeholder: 'Selecciona el material..',
      });
    }

    function cargarBotonesEliminar(){
      $(".delete-loteMaterial").each(function(index, item){
        $(this).unbind("click");
        $(this).on("click", function(event){
          $.ajax({
            type: "DELETE",
            url: "{{ url('loteMateriales/')}}/" + $(this).attr('value'),
            dataType: "json",
            success: function(data){
              if (data && data.success){
                $('#loteMaterialIndex').html(data.html);
                cargarJavascriptElementos();
              } else {
                alert(data.message);
              }
            }
          });
        });
      });
    }

    function cargarBotonesAniadir() {
      $(".add-loteMaterial").each(function(index, item){
        $(this).unbind("click");
        $(this).on("click", function(event){
          $(".print-error-msg").css('display','none');
          var formData = {
                  lote_id: {{ $lote->id }},
                  material_id: $('select[name=material_id]').val(),
                  cantidad: $('input[name=cantidad]').val(),
                  borrado_seguro: $('input[name=borrado_seguro]').is(":checked")?1:0,
                  txae: $('input[name=txae]').is(":checked")?1:0
              }
          $.ajax({
            type: "POST",
            url: "{{ url('loteMateriales')}}",
            dataType: "json",
            data: formData,
            success: function(data){
              if (data && data.success){
                  $('#loteMaterialIndex').html(data.html);
                  $(':input','#loteMaterialIndex')
                    .not(':button, :submit, :reset, :hidden')
                    .val('').change()
                    .removeAttr('checked')
                    .removeAttr('selected');
                  cargarJavascriptElementos();
              } else {
                alert(data.message);
              }
            },
            error: function(data, textStatus, errorThrown ){
                printErrorMsg(data.responseJSON);
            }
          });
        });
      });
    }

    jQuery(document).ready(function($) {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        cargarJavascriptElementos();
      });


  </script>
@endpush
