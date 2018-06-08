<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\LoteMaterial;

class InformeController extends Controller
{
  public function index()
  {
    return view('informes.index');
  }

  public function export(Request $request)
  {
    $materiales = $this->obtenerMateriales($request->input('type'));

    header("Content-type: text/csv");
    header("Content-Disposition: attachment; filename=materiales.csv");
    header("Pragma: no-cache");
    header("Expires: 0");

    $file = fopen('php://output', 'w');
    foreach ($materiales as $material) {
      fputcsv($file, (array) $material);
    }
    fclose($file);
    exit;
  }

  private function obtenerMateriales($type)
  {
    switch ($type) {
      case 'anio':
        return DB::select(DB::raw('select m.nombre, count(*) as Unidades, ROUND(sum(m.peso)/1000,0) as Kg, sum(lm.txae) as TXAE
from lote_materiales lm
	inner join materiales m
		on lm.material_id = m.id
where lm.created_at >= \'2018-01-01\'
group by lm.material_id, m.nombre;'));
      case 'mes':
        return DB::select(DB::raw('select YEAR(l.fecha) as Anio, MONTH(l.fecha) as Mes, m.nombre, count(*) as Unidades, ROUND(sum(m.peso)/1000,0) as Kg, sum(lm.txae) as TXAE
from lote_materiales lm
	inner join materiales m
		on lm.material_id = m.id
	inner join lotes l
		on lm.lote_id = l.id
where l.fecha >= \'2018-01-01\'
group by YEAR(l.fecha), MONTH(l.fecha), m.nombre
order by YEAR(l.fecha), MONTH(l.fecha);'));
      default:
        return [];
    }
  }
}
