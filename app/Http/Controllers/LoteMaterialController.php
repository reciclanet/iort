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
      $this->validate(request(), [
        'lote_id' => 'required',
        'material_id' => 'required',
        'cantidad' => 'numeric',
        'precio' => 'numeric'],
        ['material_id.required'  => 'Hay que seleccionar un tipo de material',
      ]);

      LoteMaterial::crearLoteMateriales(
        request()->except('cantidad'),
        request()->input('cantidad', 1)
      );

      $returnHTML = view('lote_material.index')
        ->with('lote', Lote::find(request()->input('lote_id')))
        ->with('materiales', Material::orderBy('nombre')->pluck('nombre', 'id'))
        ->with('edicion', true)
        ->render();

      return response()->json(['success' => true, 'html'=>$returnHTML]);
    }

    public function destroy(LoteMaterial $loteMaterial)
    {
        $loteMaterial->delete();

        $returnHTML = view('lote_material.index')
          ->with('lote', $loteMaterial->lote)
          ->with('materiales', Material::orderBy('nombre')->pluck('nombre', 'id'))
          ->with('edicion', true)
          ->render();
        return response()->json(['success' => true, 'html'=>$returnHTML]);
    }
}
