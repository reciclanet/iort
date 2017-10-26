<?php

namespace App;

class Organizacion extends Model
{
    //
    protected $table = 'organizaciones';

    protected $casts = [
                'autoriza_logo' => 'boolean'
                ];

    public function provincia()
    {
        return $this->belongsTo(Provincia::class, 'provincia_cod', 'cod');
    }

    public function lotes()
    {
        return $this->hasMany(Lote::class);
    }

    public function getNombreDescriptivo()
    {
      return $this->razon_social;
    }
}
