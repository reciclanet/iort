<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Persona;

class PersonasController extends Controller
{
    public function index() {
      $personas = Persona::all();

      return view( 'personas.index', compact('personas'));
    }

    public function show(Persona $persona) {
      return view ('personas.show', compact('persona'));
    }
}
