<?php

namespace App;

class LoteMaterial extends Model
{
    protected $table = 'lote_materiales';

    public function lote() {
      return $this->belongsTo(Lote::class);
    }

    public function material() {
      return $this->belongsTo(Material::class);
    }

    public function materialEstado() {
      return $this->belongsTo(MaterialEstado::class);
    }
}
