<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class SeedModelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        $tiposConocido = [
          ['id' => 1, 'nombre' => 'Página Web'],
          ['id' => 2, 'nombre' => 'Boca a Boca'],
          ['id' => 3, 'nombre' => 'Prensa'],
          ['id' => 4, 'nombre' => 'Facebook'],
          ['id' => 5, 'nombre' => 'Twitter'],
          ['id' => 6, 'nombre' => 'Evento'],
          ['id' => 7, 'nombre' => 'Bolunta'],
        ];

        DB::table('tipo_conocido')->insert($tiposConocido);
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
