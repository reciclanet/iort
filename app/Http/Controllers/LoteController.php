<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoteController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function create($tipo, $id) {
      dd($tipo, $id);
      $persona = Persona::create($request->except(['id', 'created_at', 'updated_at']));

      return view ('personas.show', compact('persona'));
    }
}
