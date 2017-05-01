<?php

namespace App;

class Persona extends Model
{
    //
    public function tipoConocido() {
      return $this->belongsTo(TipoConocido::class);
    }
}
