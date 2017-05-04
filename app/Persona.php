<?php

namespace App;

class Persona extends Model
{
    //
    public function tipoConocido() {
      return $this->belongsTo(TipoConocido::class);
    }

    public function sexo() {
      return $this->belongsTo(Sexo::class);
    }
}
