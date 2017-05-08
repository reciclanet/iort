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

    public function create() {
      return view ('personas.create');
    }

    public function show(Persona $persona) {
      return view ('personas.show', compact('persona'));
    }

    public function edit(Persona $persona) {
      return view ('personas.edit', compact('persona'));
    }
}
