<?php

namespace App;

class Lote extends Model
{
    public function persona()
    {
        return $this->belongsTo(Persona::class);
    }

    public function organizacion()
    {
        return $this->belongsTo(Organizacion::class);
    }

    public function tipoLote()
    {
        return $this->belongsTo(TipoLote::class);
    }

    public function responsable()
    {
        if (isset($this->persona)) {
            return $this->persona;
        } elseif (isset($this->organizacion)) {
            return $this->organizacion;
        }
    }

    public function materiales()
    {
        return $this->hasMany(LoteMaterial::class);
    }

    public function getDates()
    {
        return ['created_at', 'updated_at', 'fecha'];
    }

    public function getMaterialesAgrupados()
    {
      $materiales = [];
      foreach($this->materiales as $material){
        $codigoMaterial = $material->material_id . '_' . $material->borrado_seguro;
        if(array_key_exists($codigoMaterial, $materiales)){
          $materiales[$codigoMaterial]->cantidad++;
        } else {
          $materiales[$codigoMaterial] = $material;
        }
      }
      return $materiales;
    }
}
