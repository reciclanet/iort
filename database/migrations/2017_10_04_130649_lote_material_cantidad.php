<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use App\LoteMaterial;

class LoteMaterialCantidad extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        $materialesLote = LoteMaterial::get()->where('cantidad', '>', 1 );
        foreach($materialesLote as $loteMaterial){
          for($contador = 1; $contador < $loteMaterial->cantidad; $contador++){
              $nuevoLoteMaterial = new LoteMaterial();
              $nuevoLoteMaterial->material_id = $loteMaterial->material_id;
              $nuevoLoteMaterial->lote_id = $loteMaterial->lote_id;
              $nuevoLoteMaterial->material_estado_id = $loteMaterial->material_estado_id;
              $nuevoLoteMaterial->cantidad = 1;
              $nuevoLoteMaterial->marca = "";
              $nuevoLoteMaterial->modelo = '';
              $nuevoLoteMaterial->tag = '';
              $nuevoLoteMaterial->borrado_seguro = $loteMaterial->borrado_seguro;
              $nuevoLoteMaterial->foto = '';
              $nuevoLoteMaterial->save();
            }
            $loteMaterial->cantidad = 1;
            $loteMaterial->save();
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
