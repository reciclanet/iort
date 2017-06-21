<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoteController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function create($id_persona = null) {
      dd($id_persona);
      $persona = Persona::create($request->except(['id', 'created_at', 'updated_at']));

      return view ('personas.show', compact('persona'));
    }
}
