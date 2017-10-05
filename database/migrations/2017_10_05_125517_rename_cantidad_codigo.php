<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use App\LoteMaterial;

class RenameCantidadCodigo extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('lote_materiales', function($table) {
            $table->renameColumn('cantidad', 'codigo');
        });

        Schema::table('lote_materiales', function($table) {
            $table->integer('codigo')->unsigned()->nullable()->change();
        });

        $materialesLote = LoteMaterial::get()->where('codigo', '=', 1 );
        foreach($materialesLote as $loteMaterial) {
          $loteMaterial->codigo = null;
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
      Schema::table('lote_materiales', function($table) {
          $table->integer('codigo')->nullable()->change();
      });

      Schema::table('lote_materiales', function($table) {
          $table->renameColumn('codigo', 'cantidad');
      });

        $materialesLote = LoteMaterial::get()->where('codigo', 'is', null );
        foreach($materialesLote as $loteMaterial){
          $loteMaterial->cantidad = 1;
          $loteMaterial->save();
        }
      }
}
