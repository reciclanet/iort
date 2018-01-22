<?php

namespace App\Http\Controllers;

use App\Lote;
use App\Material;
use App\LoteMaterial;
use Illuminate\Http\Request;

class LoteMaterialController extends Controller
{
    public function store()
    {
      $lote_id = request()->input('lote_id');
      $material_id = request()->input('material_id');
      $cantidad = request()->input('cantidad');
      $txae = request()->input('txae');
      $borradoSeguro = request()->input('borrado_seguro');
      if (!empty($lote_id) && !empty($material_id) && !empty($cantidad)) {

          LoteMaterial::crearLoteMateriales($lote_id, $material_id, $cantidad, $txae, $borradoSeguro);

          $returnHTML = view('lote_material.index')
            ->with('lote', Lote::find($lote_id))
            ->with('materiales', Material::pluck('nombre', 'id'))
            ->with('edicion', true)
            ->render();
          return response()->json(['success' => true, 'html'=>$returnHTML]);
      }

      return response()->json(['success' => false, 'message'=>'algo']);
    }

    public function destroy(LoteMaterial $loteMaterial)
    {
        $loteMaterial->delete();

        $returnHTML = view('lote_material.index')
          ->with('lote', $loteMaterial->lote)
          ->with('materiales', Material::pluck('nombre', 'id'))
          ->with('edicion', true)
          ->render();
        return response()->json(['success' => true, 'html'=>$returnHTML]);
    }
}
