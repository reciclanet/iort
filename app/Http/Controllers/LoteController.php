<?php

namespace App\Http\Controllers;

use App\Lote;
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
      return view('lotes.edit', compact('lote'));
    }

    public function update(Lote $lote) {
      $lote->update(request()->except(['id', 'created_at', 'updated_at']));

      return view ('lotes.show', compact('lote'));
    }
}
