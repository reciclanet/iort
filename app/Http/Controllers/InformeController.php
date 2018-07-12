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
    $datos = $this->obtenerDatosInforme($request->input('type'));

    if (count($datos) > 0) {

      header("Content-type: text/csv");
      header("Content-Disposition: attachment; filename=materiales.csv");
      header("Pragma: no-cache");
      header("Expires: 0");

      $file = fopen('php://output', 'w');

      fputcsv($file, array_keys((array) $datos[0]));

      foreach ($datos as $fila) {
        fputcsv($file, (array) $fila);
      }
      fclose($file);
    }
    exit;
  }

  private function obtenerDatosInforme($type)
  {
    switch ($type) {
      case 'anio':
        return DB::select(DB::raw('SELECT m.nombre as Material, count(*) as Unidades, ROUND(sum(m.peso)/1000,0) as Kg, sum(lm.txae) as TXAE
from lote_materiales lm
	inner join materiales m
		on lm.material_id = m.id
where lm.created_at >= \'2018-01-01\'
group by lm.material_id, m.nombre;'));
      case 'mes':
        return DB::select(DB::raw('SELECT YEAR(l.fecha) as Anio, MONTH(l.fecha) as Mes, m.nombre as Material, count(*) as Unidades, ROUND(sum(m.peso)/1000,0) as Kg, sum(lm.txae) as TXAE
from lote_materiales lm
	inner join materiales m
		on lm.material_id = m.id
	inner join lotes l
		on lm.lote_id = l.id
where l.fecha >= \'2018-01-01\'
group by YEAR(l.fecha), MONTH(l.fecha), m.nombre
order by YEAR(l.fecha), MONTH(l.fecha);'));
      case 'logos':
        return DB::select(DB::raw('SELECT id, razon_social, pagina_web FROM organizaciones WHERE autoriza_logo = 1 AND logo IS NULL ORDER BY id DESC;'));
      default:
        return [];
    }
  }
}
