<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\LoteMaterial;

class TxaeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function edit()
    {
        return view('txaes.edit');
    }

    public function update()
    {
        $this->validate(request(), [
          'codigo' => 'required|numeric',
        ]);
        $materiales = LoteMaterial::Entrada()
          ->whereCodigo(request()->input('codigo'))
          ->where(function ($query) {
              $query->whereNull('txae')
                    ->orWhere('txae','=','0');
          })
          ->get();

        $contador = 0;
        foreach($materiales as $material) {
          $material->txae = 1;
          $material->save();
          $contador++;
        }

        $mensaje = "Se han marcado $contador registros.";

        return redirect()
          ->action('TxaeController@edit')
          ->with('message', $mensaje);
    }
}
