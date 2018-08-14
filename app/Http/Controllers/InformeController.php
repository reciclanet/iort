<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Informe;

class InformeController extends Controller
{
  public function index()
  {
    $informes = Informe::all();

    return view('informes.index', compact('informes'));
  }

  public function show(Informe $informe)
  {
    $datos = DB::select(DB::raw($informe->query));

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
}
