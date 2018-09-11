@extends('layouts.app')

@section('content')
  <div id="loteMateriales">
    <h1>Materiales Lotes</h1>
    <div>
      <table class="table">
          <thead>
              <tr>
                <th>Codigo</th>
                <th>Responsable</th>
                <th>Fecha</th>
                <th>Material</th>
                <th></th>
              </tr>
          </thead>
          <tbody>
            @foreach ($loteMateriales as $loteMaterial)
              <tr>
                <td>{{ $loteMaterial->codigo }}</td>
                <td>{{ $loteMaterial->lote->responsable->codigo }}</td>
                <td>{{ $loteMaterial->lote->fecha->format('Ymd') }}</td>
                <td>{{ $loteMaterial->material->nombre }}</td>
                <td>
                  <button type="button" class="btn btn-danger txae-loteMaterial" value="{{$loteMaterial->codigo}}">Marcar Txae</button>
                </td>
              </tr>
            @endforeach
          </tbody>
      </table>
      {{ $loteMateriales->links() }}
    </div>
  </div>
@endsection

@push('scripts')
  <script>

    function cargarBotonesMarcarTxae(){
      $(".txae-loteMaterial").each(function(index, item){
        $(this).unbind("click");
        $(this).on("click", function(event){
          if(!confirm('Estás seguro de que quieres marcar el código ' + $(this).attr('value') + ' como Txae?')){
              event.preventDefault();
              return;
          }

          $.ajax({
            type: "PATCH",
            url: "{{ action('TxaeController@update') }}",
            dataType: "json",
            data: {
              codigo: $(this).attr('value')
            },
            success: function(){
              location.reload();
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

        cargarBotonesMarcarTxae();
      });


  </script>
@endpush
