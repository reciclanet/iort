<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Organizacion;
use App\Provincia;
use App\Tag;
use App\TipoConocido;
use App\Http\Requests\GuardarOrganizacionRequest;
use Yajra\Datatables\Facades\Datatables;

class OrganizacionController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->breadcrumbs = [['title' => 'organizaciones','url' => '/organizaciones/']];
    }
    //
    public function index()
    {
        $organizaciones = Organizacion::orderBy('razon_social', 'asc')->get();

        return view('organizaciones.index', compact('organizaciones'));
    }

    protected function formulario($vista, Organizacion $organizacion)
    {
        $tipos_conocido = TipoConocido::pluck('nombre', 'id');
        $provincias = Provincia::orderBy('nombre', 'asc')->pluck('nombre', 'cod');
        $tags = Tag::all()->pluck('nombre', 'id');;
        $breadcrumbs = $this->breadcrumbs;

        return view(
          $vista,
          compact(
            'organizacion',
            'tipos_conocido',
            'provincias',
            'tags',
            'breadcrumbs'
          )
        );
    }

    public function create()
    {
        $this->breadcrumbs[] = ['title' => 'crear'];
        return $this->formulario('organizaciones.create', new Organizacion);
    }

    public function show(Organizacion $organizacion)
    {
      $breadcrumbs = $this->breadcrumbs;
      $breadcrumbs[] = ['title' => 'organizacion'];
      return view('organizaciones.show', compact('organizacion', 'breadcrumbs'));
    }

    public function edit(Organizacion $organizacion)
    {
      $this->breadcrumbs[] = ['title' => 'organizacion','url' => '/organizaciones/' . $organizacion->id];
      $this->breadcrumbs[] = ['title' => 'editar'];
      return $this->formulario('organizaciones.edit', $organizacion);
    }

    public function store(GuardarOrganizacionRequest $request)
    {
        $organizacion = $this->crearOrganizacion($request);

        return view('organizaciones.show', compact('organizacion'));
    }

    public function update(GuardarOrganizacionRequest $request, Organizacion $organizacion)
    {
        $request->merge(['autoriza_logo' => ($request->autoriza_logo) ? 1 : 0]);
        $organizacion->update($request->except(['id', 'created_at', 'updated_at', 'logo_file', 'tags']));
        $this->sincronizarTags($organizacion, $request->input('tags', []));

        $this->subirLogo($organizacion, $request);

        return view('organizaciones.show', compact('organizacion'));
    }

    public function colaboradores()
    {
        $organizaciones = Organizacion::all();

        return view('organizaciones.colaboradores', compact('organizaciones'));
    }

    /**
     * Process datatables ajax request.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function getData()
    {
        return Datatables::eloquent(Organizacion::query())
          ->editColumn('razon_social', function (Organizacion $organizacion) {
            return '<a href="/organizaciones/'. $organizacion->id . '">' . $organizacion->razon_social . '</a>';
          })
            ->rawColumns(['razon_social'])
            ->make(true);
    }

    protected function tratarTags(array $tags)
    {
      return null;
    }

    /**
     * Sincroniza los tags de una organización
     *
     * @param Organizacion $organizacion
     * @param array $tags
     */
    protected function sincronizarTags(Organizacion $organizacion, array $tags)
    {
      $tags = array_map(function($valor){
        $valorNuevo = str_replace("nuevo|", "", $valor);
        if (strlen($valor) != strlen($valorNuevo)){
          $valorNuevo = trim($valorNuevo);
          $tag = Tag::find($valorNuevo);
          if (!$tag){
            $tag = Tag::create(['nombre' => "$valorNuevo"]);
          }
          $valor = $tag->id;
        }
        return $valor;
      }, $tags);

      $organizacion->tags()->sync($tags);
    }

    /**
     * Actualiza el logo de la organización
     *
     * @param Organizacion $organizacion
     * @param GuardarOrganizacionRequest $request
     */
    protected function subirLogo(Organizacion $organizacion, GuardarOrganizacionRequest $request)
    {
      if ($organizacion->autoriza_logo && $fichero = $request->file('logo_file')) {
          $imagen = $organizacion->id . '.' .
            $fichero->getClientOriginalExtension();

          $fichero->move(
              base_path() . '/public/images/logos/',
              $imagen
          );

          $organizacion->logo = $imagen;
          $organizacion->save();
      }
    }

    /**
     * Crea una organización a partir del formulario
     *
     * @param GuardarOrganizacionRequest $request
     * @return mixed
     */
    protected function crearOrganizacion(GuardarOrganizacionRequest $request)
    {
      $request->merge(['autoriza_logo' => ($request->autoriza_logo) ? 1 : 0]);
      $organizacion = Organizacion::create($request->except(['id', 'created_at', 'updated_at', 'logo_file', 'tags']));
      $this->sincronizarTags($organizacion, $request->input('tags', []));

      $this->subirLogo($organizacion, $request);

      return $organizacion;
    }
}
