<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class LoteMaterialAniadirPrecio extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::table('lote_materiales', function (Blueprint $table) {
          $table->decimal('precio', 10, 2)->nullable();
      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
      Schema::table('lote_materiales', function (Blueprint $table) {
          $table->dropColumn('precio');
      });
    }
}
