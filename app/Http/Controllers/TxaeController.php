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

    public function index()
    {

        $consulta = LoteMaterial::with(['material', 'lote', 'lote.responsable'])
            ->entrada()
            ->noTxae()
            ->orderBy('codigo', 'desc');

        if (request()->has('q')) {
          $q = request('q');
          $consulta->where('codigo', 'like', "%$q%");
        }

        $loteMateriales = $consulta->paginate();

        return view('txaes.index', compact('loteMateriales'));
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
        $material = LoteMaterial::Entrada()
          ->whereCodigo(request()->input('codigo'))
          ->noTxae()
          ->first();

        $success = 'flash_error';
        $message = "El código no ha podido marcarse como Txae.";

        if ($material) {
          $material->txae = 1;
          $material->save();
          $success = 'flash_ok';
          $message = "El código ha sido marcado como Txae.";

        }

        session()->flash($success, $message);

        if(request()->ajax()){
            return response()->json(['success' => true]);
        }

        return back();
    }
}
