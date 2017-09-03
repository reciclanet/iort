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
use Yajra\Datatables\Facades\Datatables;

class PersonasController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $personas = Persona::orderBy('nombre', 'asc')->orderBy('apellido_1', 'asc')->orderBy('apellido_2', 'asc')->get();

        return view('personas.index', compact('personas'));
    }

    protected function formulario($vista, Persona $persona)
    {
        $tipos_alta = TipoAlta::pluck('nombre', 'id');
        $tipos_conocido = TipoConocido::pluck('nombre', 'id');
        $sexos = Sexo::pluck('nombre', 'id');
        $organizaciones = Organizacion::pluck('razon_social', 'id');
        $provincias = Provincia::orderBy('nombre', 'asc')->pluck('nombre', 'cod');

        return view(
          $vista,
          compact(
            'persona',
            'tipos_alta',
            'tipos_conocido',
            'sexos',
            'organizaciones',
            'provincias'
          )
        );
    }

    public function create()
    {
        return $this->formulario('personas.create', new Persona);
    }

    public function show(Persona $persona)
    {
        return view('personas.show', compact('persona'));
    }

    public function edit(Persona $persona)
    {
        return $this->formulario('personas.edit', $persona);
    }

    public function store(GuardarPersonaRequest $request)
    {
        $persona = Persona::create($request->except(['id', 'created_at', 'updated_at']));

        return view('personas.show', compact('persona'));
    }

    public function update(GuardarPersonaRequest $request, Persona $persona)
    {
        $persona->update($request->except(['id', 'created_at', 'updated_at']));

        return view('personas.show', compact('persona'));
    }

    /**
     * Process datatables ajax request.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function getData()
    {
        return Datatables::eloquent(Persona::query())
          ->editColumn('nombre', function (Persona $persona) {
            return '<a href="/personas/'. $persona->id . '">' . $persona->nombre . '</a>';
          })
        // ->addColumn('action', function (Persona $persona) {
        //         return '<a href="/personas/'. $persona->id . '" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-edit"></i> Edit</a>';
        //     })
            ->rawColumns(['nombre'])
            ->make(true);
    }
}
