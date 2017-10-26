<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class LoteMaterialesTxae extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::dropIfExists('material_estados');

      Schema::table('lote_materiales', function($table) {
          $table->renameColumn('material_estado_id', 'txae');
      });

      Schema::table('lote_materiales', function($table) {
          $table->boolean('txae')->change();
      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::create('material_estados', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre');
            $table->timestamps();
        });

        $material_estados = [
          ['id' => 1, 'nombre' => 'TXAE'],
          ['id' => 2, 'nombre' => 'Reutilizar'],
        ];

        DB::table('material_estados')->insert($material_estados);

        Schema::table('lote_materiales', function($table) {
            $table->integer('txae')->unsigned()->change();
        });

        Schema::table('lote_materiales', function($table) {
            $table->renameColumn('txae', 'material_estado_id');
        });
    }
}
