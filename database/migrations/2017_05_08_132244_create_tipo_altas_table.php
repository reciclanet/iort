<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTipoAltasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tipo_alta', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre');
        });

        $tipoAlta = [
          ['id' => 1, 'nombre' => 'colaborador'],
          ['id' => 2, 'nombre' => 'cliente'],
        ];

        DB::table('tipo_alta')->insert($tipoAlta);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tipo_alta');
    }
}
