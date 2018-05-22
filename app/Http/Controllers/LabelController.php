<?php

namespace App\Http\Controllers;

use Illuminate\Http\Response;
use App\Lote;
use App\LoteMaterial;
use App\Http\Requests\LabelsFiltroRequest;

class LabelController extends Controller
{
  public function index(LabelsFiltroRequest $request)
  {
    $materiales = LoteMaterial::select(
        'lote_materiales.codigo as codigo_material',
        'organizaciones.id as id_organizacion',
        'organizaciones.codigo as codigo_organizacion',
        'lotes.fecha')
      ->join('lotes', 'lote_materiales.lote_id', '=', 'lotes.id')
      ->leftJoin('organizaciones', 'lotes.organizacion_id', '=', 'organizaciones.id')
      ->whereNotNull('lote_materiales.codigo')
      //->where('lotes.fecha', '>=', '2018-05-02')
      ->paginate(10);
dump($request);
      return view('labels.index', compact('materiales'));
  }

  public function export(LabelsFiltroRequest $request)
  { dd($request);
    $materiales = LoteMaterial::whereNotNull('codigo')
      ->with('lote')
      ->get();

    header("Content-type: text/csv");
    header("Content-Disposition: attachment; filename=labels.csv");
    header("Pragma: no-cache");
    header("Expires: 0");

    $file = fopen('php://output', 'w');
    foreach ($materiales as $material) {
      fputcsv($file, [$material->id,
          (isset($material->lote->persona) ? 'Particular' : $material->lote->responsable()->codigo),
          $material->lote->fecha->format('Ymd')]);
    }
    fclose($file);
    exit;
  }
}
