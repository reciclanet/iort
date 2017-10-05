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

    public function materialEstado()
    {
        return $this->belongsTo(MaterialEstado::class);
    }

    public static function getCodigoSiguiente()
    {
        $codigo = DB::table('lote_materiales')
          ->whereYear('created_at', ''.Carbon::today()->year)
          ->max('codigo');

        return $codigo ? $codigo + 1 : 1;
    }
}
