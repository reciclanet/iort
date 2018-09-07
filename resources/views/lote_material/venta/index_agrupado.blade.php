<table style="width: 100%;">
  <tr>
    <th>Material</th>
    <th>Cantidad</th>
  </tr>
  <tr class="hr"><td colspan="3"></td></tr>
  @foreach ($lote->getMaterialesAgrupados() as $material)
    <tr>
      <td class="text-center">{{ $material->material->nombre }}</td>
      <td class="text-center">{{ $material->cantidad }}</td>
    </tr>
    <tr class="hr"><td colspan="3"></td></tr>
  @endforeach
</table>
