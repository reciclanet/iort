<?php

namespace App;

class Lote extends Model
{
  public function persona() {
    return $this->belongsTo(Persona::class);
  }

  public function organizacion() {
    return $this->belongsTo(Organizacion::class);
  }

  public function materiales(){
    return $this->hasMany(LoteMaterial::class);
  }
}
