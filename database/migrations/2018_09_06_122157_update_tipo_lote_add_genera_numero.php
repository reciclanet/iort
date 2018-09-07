<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateTipoLoteAddGeneraNumero extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::table('tipo_lote', function (Blueprint $table) {
          $table->boolean('genera_numero')->default(0);
      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
      Schema::table('tipo_lote', function (Blueprint $table) {
          $table->dropColumn('genera_numero');
      });
    }
}
