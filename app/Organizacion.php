<?php

namespace App;

class Organizacion extends Model
{
    //
    protected $table = 'organizaciones';

    public function provincia() {
      return $this->belongsTo(Provincia::class, 'cod');
    }
}
