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

    public static function crearLoteMateriales($lote_id, $material_id, $cantidad, $txae, $borradoSeguro)
    {
      if (!empty($lote_id) && !empty($material_id) && !empty($cantidad)) {
        $material = Material::find($material_id);

        for($contador = 0; $contador < $cantidad; $contador++){
          $loteMaterial = new LoteMaterial();
          $loteMaterial->material_id = $material_id;
          $loteMaterial->lote_id = $lote_id;
          $loteMaterial->txae = ($txae == 'true');
          if (!$loteMaterial->txae && $material->genera_numero) {
            $loteMaterial->codigo = LoteMaterial::getCodigoSiguiente();
          }
          $loteMaterial->marca = "";
          $loteMaterial->modelo = '';
          $loteMaterial->tag = '';
          $loteMaterial->borrado_seguro = ($borradoSeguro == 'true');
          $loteMaterial->foto = '';
          $loteMaterial->save();
        }
      }
    }
}
