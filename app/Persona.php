<?php

namespace App;

class Persona extends Model
{
    public function tipoConocido()
    {
        return $this->belongsTo(TipoConocido::class);
    }

    public function tipoAlta()
    {
        return $this->belongsTo(TipoAlta::class);
    }

    public function sexo()
    {
        return $this->belongsTo(Sexo::class);
    }

    public function organizacion()
    {
        return $this->belongsTo(Organizacion::class);
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
      return $this->nombre .
        (empty($this->apellido_1) ? '' : ' ' . $this->apellido_1) .
        (empty($this->apellido_2) ? '' : ' ' . $this->apellido_2);
    }

    public function getRuta()
    {
      return 'personas';
    }

    public function getCodigoAttribute()
    {
      return 'Particular';
    }
}
