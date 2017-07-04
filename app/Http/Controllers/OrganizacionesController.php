<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Organizacion;
use App\Provincia;
use App\Http\Requests\GuardarOrganizacionRequest;

class OrganizacionesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    //
    public function index() {
      $organizaciones = Organizacion::orderBy('razon_social', 'asc')->get();

      return view( 'organizaciones.index', compact('organizaciones'));
    }

    protected function formulario($vista, Organizacion $organizacion) {
      $provincias = Provincia::orderBy('nombre', 'asc')->pluck('nombre', 'cod');

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
      $request->merge(['autoriza_logo' => ($request->autoriza_logo) ? 1 : 0]);
      $organizacion = Organizacion::create($request->except(['id', 'created_at', 'updated_at', 'logo']));

      if ($organizacion->autoriza_logo && $fichero = $request->file('logo')) {
        $imagen = $organizacion->id . '.' .
          $fichero->getClientOriginalExtension();

        $fichero->move(
            base_path() . '/public/images/logos/', $imagen);

        $organizacion->logo = $imagen;
        $organizacion->save();
      }

      return view ('organizaciones.show', compact('organizacion'));
    }

    public function update(GuardarOrganizacionRequest $request, Organizacion $organizacion) {
      $request->merge(['autoriza_logo' => ($request->autoriza_logo) ? 1 : 0]);
      $organizacion->update($request->except(['id', 'created_at', 'updated_at', 'logo']));

      if ($organizacion->autoriza_logo && $fichero = $request->file('logo')) {
        $imagen = $organizacion->id . '.' .
          $fichero->getClientOriginalExtension();

        $fichero->move(
            base_path() . '/public/images/logos/', $imagen);

        $organizacion->logo = $imagen;
        $organizacion->save();
      }

      return view ('organizaciones.show', compact('organizacion'));
    }

    public function colaboradores() {
      $organizaciones = Organizacion::all();

      return view( 'organizaciones.colaboradores', compact('organizaciones'));
    }
}
