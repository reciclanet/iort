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
        $responsable = $lote->responsable;

        return view('lotes.informe', compact('lote', 'responsable'));
    }

    public function store($tipo, $id)
    {
        $lote = new Lote;
        $lote->fecha = Carbon::now();
        $lote->descripcion = '';
        $lote->responsable_type = $tipo;
        $lote->responsable_id = $id;

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
          'fecha' => request()->input('fecha'),
          'tipo_lote_id' => request()->input('tipo_lote_id')
        ]);

        $material_id = request()->input('material_id');
        $cantidad = request()->input('cantidad');
        $txae = request()->input('txae');
        $borradoSeguro = request()->input('borrado_seguro');
        if (!empty($material_id) && !empty($cantidad)) {

            LoteMaterial::crearLoteMateriales($lote->id, $material_id, $cantidad, $txae, $borradoSeguro);
        }

        return redirect()->action('LoteController@show', compact('lote'));
    }
}
