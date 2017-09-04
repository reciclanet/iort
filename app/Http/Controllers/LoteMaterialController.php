<?php

namespace App\Http\Controllers;

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
      if (!empty($lote_id) && !empty($material_id) && !empty($cantidad)) {
          $loteMaterial = new LoteMaterial(request(['material_id', 'cantidad']));
          $loteMaterial->lote_id = $lote_id;
          $loteMaterial->material_estado_id = 1;
          $loteMaterial->marca = "";
          $loteMaterial->modelo = '';
          $loteMaterial->tag = '';
          $loteMaterial->borrado_seguro = (request()->input('borrado_seguro') == 'true');
          $loteMaterial->foto = '';
          $loteMaterial->save();

          $returnHTML = view('lote_material.index')
            ->with('lote', $loteMaterial->lote)
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
