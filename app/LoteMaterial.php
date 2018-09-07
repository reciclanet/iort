<?php

namespace App;

use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class LoteMaterial extends Model
{
    protected $table = 'lote_materiales';

    public function lote()
    {
        return $this->belongsTo(Lote::class);
    }

    public function material()
    {
        return $this->belongsTo(Material::class);
    }

    public static function getCodigoSiguiente()
    {
        $codigo = DB::table('lote_materiales')
          //->whereYear('created_at', ''.Carbon::today()->year)
          ->max('codigo');

        return $codigo ? $codigo + 1 : 1;
    }

    public static function crearLoteMateriales($datos, $cantidad)
    {
      $material = Material::findOrFail($datos['material_id']);
      $lote = Lote::with('tipoLote')->findOrFail($datos['lote_id']);

      for($contador = 0; $contador < $cantidad; $contador++){
        $loteMaterial = new LoteMaterial($datos);
        if ($lote->tipoLote->genera_numero && !$loteMaterial->txae && $material->genera_numero) {
          $loteMaterial->codigo = LoteMaterial::getCodigoSiguiente();
        }
        $loteMaterial->save();
      }
    }
}
