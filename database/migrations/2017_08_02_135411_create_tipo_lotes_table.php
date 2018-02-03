<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTipoLotesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tipo_lote', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre');
        });

        $tipoLote = [
          ['id' => 1, 'nombre' => 'Entrada'],
          ['id' => 2, 'nombre' => 'Venta'],
          ['id' => 3, 'nombre' => 'Donación'],
          ['id' => 4, 'nombre' => 'Préstamo'],
          ['id' => 5, 'nombre' => 'Sustitución'],
        ];

        DB::table('tipo_lote')->insert($tipoLote);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tipo_lote');
    }
}
