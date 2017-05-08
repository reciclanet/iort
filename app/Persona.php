<?php

namespace App;

class Persona extends Model
{
    //
    public function tipoConocido() {
      return $this->belongsTo(TipoConocido::class);
    }

    public function tipoAlta() {
      return $this->belongsTo(TipoAlta::class);
    }

    public function sexo() {
      return $this->belongsTo(Sexo::class);
    }

    public function organizacion() {
      return $this->belongsTo(Organizacion::class);
    }
}
