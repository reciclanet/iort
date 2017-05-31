<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Organizacion;
use App\Provincia;
use App\Http\Requests\GuardarOrganizacionRequest;

class OrganizacionesController extends Controller
{
    //
    public function index() {
      $organizaciones = Organizacion::all();

      return view( 'organizaciones.index', compact('organizaciones'));
    }

    protected function formulario(string $vista, Organizacion $organizacion) {
      $provincias = Provincia::pluck('nombre', 'cod');

      return view ($vista,
        compact('organizacion',
          'provincias'));
    }

    public function create() {
      return $this->formulario('organizaciones.create', new Organizacion);
    }

    public function show(Organizacion $organizacion) {
      return view ('organizaciones.show', compact('organizacion'));
    }

    public function edit(Organizacion $organizacion) {
      return $this->formulario('organizaciones.edit', $organizacion);
    }

    public function store(GuardarOrganizacionRequest $request) {
      Organizacion::create($request->except(['id', 'created_at', 'updated_at']));

      return redirect('/organizaciones');
    }

    public function update(GuardarOrganizacionRequest $request, Organizacion $organizacion) {
      $organizacion->update($request->except(['id', 'created_at', 'updated_at']));

      return view ('organizaciones.show', compact('organizacion'));
    }
}
