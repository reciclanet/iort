<?php

namespace App;

class Organizacion extends Model
{
    //
    protected $table = 'organizaciones';

    protected $casts = [
                'autoriza_logo' => 'boolean'
                ];

    public function tipoConocido()
    {
        return $this->belongsTo(TipoConocido::class);
    }

    public function provincia()
    {
        return $this->belongsTo(Provincia::class, 'provincia_cod', 'cod');
    }

    public function lotes()
    {
        return $this->morphMany(Lote::class, 'responsable');
    }

    public function getNombreDescriptivo()
    {
      return $this->razon_social;
    }

    public function tags()
    {
      return $this->belongsToMany(Tag::class);
    }

    public function getRuta()
    {
      return 'organizaciones';
    }
}
