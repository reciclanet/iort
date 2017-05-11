<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Persona;
use App\Http\Requests\GuardarPersonaRequest;

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

    public function store(GuardarPersonaRequest $request) {
      $persona->update($request->except(['id', 'created_at', 'updated_at']));

      return redirect('/personas');
    }

    public function update(GuardarPersonaRequest $request, Persona $persona) {
      $persona->update($request->except(['id', 'created_at', 'updated_at']));

      return view ('personas.show', compact('persona'));
    }
}
