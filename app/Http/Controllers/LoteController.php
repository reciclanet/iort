<?php

namespace App\Http\Controllers;

use App\Lote;
use App\LoteMaterial;
use App\Material;
use Illuminate\Http\Request;

class LoteController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function show(Lote $lote) {
      return view ('lotes.show', compact('lote'));
    }

    public function showInforme(Lote $lote) {
      $responsable = $lote->responsable();
      return view ('lotes.informe', compact('lote','responsable'));
    }

    public function store($tipo, $id) {
      //dd($tipo, $id);
      //$persona = Persona::create($request->except(['id', 'created_at', 'updated_at']));

      $lote = new Lote;
      $lote->descripcion = '';
      if ($tipo == 'persona') {
        $lote->persona_id = $id;
      } else if ($tipo == 'organizacion') {
        $lote->organizacion_id = $id;
      } else {
        dd();
      }

      if ($lote->save()) {
        return redirect('/lotes/'.$lote->id .'/edit');
      } else {
        dd();
      }
    }

    public function edit(Lote $lote) {
      $materiales = Material::pluck('nombre', 'id');
      return view ('lotes.edit', compact('lote', 'materiales'));
    }

    public function update(Lote $lote) {
      $descripcion = request()->input('descripcion');
      if (empty($descripcion)) {
        $descripcion = '';
      }
      $lote->update(['descripcion' => $descripcion]);

      $material_id = request()->input('material_id');
      $cantidad = request()->input('cantidad');
      if (!empty($material_id) && !empty($cantidad)) {
        $loteMaterial = new LoteMaterial(request(['material_id', 'cantidad']));
        $loteMaterial->lote_id = $lote->id;
        //$loteMaterial->material_id = request(['material_id']);
        //$loteMaterial->cantidad = request(['cantidad']);
        $loteMaterial->material_estado_id = 1;
        $loteMaterial->marca = "";
        $loteMaterial->modelo = '';
        $loteMaterial->tag = '';
        $loteMaterial->borrado_seguro = !empty(request(['borrado_seguro']));
        $loteMaterial->foto = '';
        $loteMaterial->save();
      }

      return view ('lotes.show', compact('lote'));
    }
}
