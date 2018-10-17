<?php

namespace App\Http\Controllers;

use App\Lote;
use App\LoteMaterial;
use App\Material;
use App\TipoLote;
use Illuminate\Http\Request;
use Carbon\Carbon;

class LoteController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
      $lotes = Lote::with(['responsable', 'tipoLote'])
          ->orderBy('fecha', 'desc')
          ->orderBy('id', 'desc')
          ->paginate();

      return view('lotes.index', compact('lotes'));
    }


    public function show(Lote $lote)
    {
      $url =  '/' . $lote->responsable->getRuta() . '/' . $lote->responsable->id;
      $breadcrumbs[] = ['title' => $lote->responsable->getNombreDescriptivo(),'url' => $url];
      $breadcrumbs[] = ['title' => 'lote'];

      return view('lotes.show', compact('lote', 'breadcrumbs'));
    }

    public function showInforme(Lote $lote)
    {
        return view('lotes.informe', compact('lote'));
    }

    public function create()
    {
      $tipo = request()->input('tipo');
      $id = request()->input('id');

      $tiposLote = TipoLote::pluck('nombre', 'id');

      return view('lotes.create', compact('tipo', 'id', 'tiposLote'));
    }

    public function store()
    {
        $lote = new Lote;
        $lote->fecha = Carbon::now();
        $lote->descripcion = '';
        $lote->responsable_type = request()->input('tipo');
        $lote->responsable_id = request()->input('id');
        $lote->tipo_lote_id = request()->input('tipo_lote_id');

        if ($lote->save()) {
            return redirect('/lotes/'.$lote->id .'/edit');
        } else {
            dd();
        }
    }

    public function edit(Lote $lote)
    {
        $materiales = Material::orderBy('nombre')->pluck('nombre', 'id');
        $tiposLote = TipoLote::pluck('nombre', 'id');
        $edicion = true;

        $url =  '/' . $lote->responsable->getRuta() . '/' . $lote->responsable->id;
        $breadcrumbs[] = ['title' => $lote->responsable->getNombreDescriptivo(),'url' => $url];
        $breadcrumbs[] = ['title' => 'lote', 'url' => '/lotes/' . $lote->id];
        $breadcrumbs[] = ['title' => 'editar'];

        return view('lotes.edit', compact('lote', 'materiales', 'edicion', 'tiposLote', 'breadcrumbs'));
    }

    public function update(Lote $lote)
    {
        $descripcion = request()->input('descripcion');
        if (empty($descripcion)) {
            $descripcion = '';
        }
        $lote->update([
          'descripcion' => $descripcion,
          'fecha' => request()->input('fecha')
        ]);

        $material_id = request()->input('material_id');
        if (!empty($material_id)) {
          $datos = request()
            ->only(['material_id',
                    'codigo',
                    'marca',
                    'modelo',
                    'borrado_seguro',
                    'txae',
                    'precio'
          ]);
          $datos['lote_id'] = $lote->id;
          LoteMaterial::crearLoteMateriales(
            $datos,
            request()->input('cantidad', 1)
          );
        }

        return redirect()->action('LoteController@show', compact('lote'));
    }
}
