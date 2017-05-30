<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Persona;
use App\TipoAlta;
use App\TipoConocido;
use App\Sexo;
use App\Organizacion;
use App\Provincia;
use App\Http\Requests\GuardarPersonaRequest;

class PersonasController extends Controller
{
    public function index() {
      $personas = Persona::all();

      return view( 'personas.index', compact('personas'));
    }

    public function create() {
      $persona = new Persona;
      $tipos_alta = TipoAlta::pluck('nombre', 'id');
      $tipos_conocido = TipoConocido::pluck('nombre', 'id');
      $sexos = Sexo::pluck('nombre', 'id');
      $organizaciones = Organizacion::pluck('nombre', 'id');
      $provincias = Provincia::pluck('nombre', 'cod');

      return view ('personas.create', compact('persona', 'tipos_alta', 'tipos_conocido', 'sexos', 'organizaciones', 'provincias'));
    }

    public function show(Persona $persona) {
      return view ('personas.show', compact('persona'));
    }

    public function edit(Persona $persona) {
      $tipos_alta = TipoAlta::pluck('nombre', 'id');
      $tipos_conocido = TipoConocido::pluck('nombre', 'id');
      $sexos = Sexo::pluck('nombre', 'id');
      $organizaciones = Organizacion::pluck('nombre', 'id');
      $provincias = Provincia::pluck('nombre', 'cod');

      return view ('personas.edit', compact('persona', 'tipos_alta', 'tipos_conocido', 'sexos', 'organizaciones', 'provincias'));
    }

    public function store(GuardarPersonaRequest $request) {
      Persona::create($request->except(['id', 'created_at', 'updated_at']));

      return redirect('/personas');
    }

    public function update(GuardarPersonaRequest $request, Persona $persona) {
      $persona->update($request->except(['id', 'created_at', 'updated_at']));

      return view ('personas.show', compact('persona'));
    }
}
