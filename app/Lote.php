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

    public function getMaterialesAgrupados($campos = [])
    {
      $materiales = [];
      foreach($this->materiales as $material){
        $codigoMaterial = "";
        foreach($campos as $campo){
          $codigoMaterial .= $material[$campo] . "_";
        }
        //$codigoMaterial = "($material->material_id)_($material->borrado_seguro)";
        if(array_key_exists($codigoMaterial, $materiales)){
          $materiales[$codigoMaterial]->cantidadSuma++;
          $materiales[$codigoMaterial]->precioSuma += $material->precio ?? 0;

        } else {
          $material->cantidadSuma = 1;
          $material->precioSuma = $material->precio ?? 0;
          $materiales[$codigoMaterial] = $material;
        }
      }
      return $materiales;
    }
}
