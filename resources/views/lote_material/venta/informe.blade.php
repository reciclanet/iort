@include ("lote_material.".strtolower($lote->tipoLote->nombre).".index_agrupado")

@section('footer')
  <p >
    <span class="negrita" style="border: 1px solid black;padding: .2em;">
      NOTA: El formateo del equipo a un Sistema Operativo que no sea Software Libre, invalida la garantía
    </span>
  </p>

  @parent
@stop
