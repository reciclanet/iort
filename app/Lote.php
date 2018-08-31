<?php

namespace App;

class Lote extends Model
{
    public function tipoLote()
    {
        return $this->belongsTo(TipoLote::class);
    }

    public function responsable()
    {
        return $this->morphTo();
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
          $material->cantidad = 1;
          $materiales[$codigoMaterial] = $material;
        }
      }
      return $materiales;
    }
}
