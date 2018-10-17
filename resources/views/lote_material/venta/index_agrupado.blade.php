<table style="width: 100%;">
  <tr>
    <th>Material</th>
    <th>Precio</th>
    <th>Cantidad</th>
    <th>Total</th>
  </tr>
  <tr class="hr"><td colspan="3"></td></tr>
  @php
    $total = 0;
  @endphp

  @foreach ($lote->getMaterialesAgrupados(['material_id','precio']) as $material)
    <tr>
      <td class="text-center">{{ $material->material->nombre }}</td>
      <td class="text-center">{{ $material->precio }}€</td>
      <td class="text-center">{{ $material->cantidadSuma }}</td>
      <td class="text-center">{{ $material->precioSuma }}€</td>
    </tr>
    <tr class="hr"><td colspan="3"></td></tr>
    @php
      $total += $material->precioSuma
    @endphp
  @endforeach
  <tr>
    <td class="text-center"></td>
    <td class="text-center"></td>
    <td class="text-right negrita">Total:</td>
    <td class="text-center negrita">{{ $total }}€</td>
  </tr>
</table>
