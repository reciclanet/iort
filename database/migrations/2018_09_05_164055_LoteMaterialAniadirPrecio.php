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
          $table->string('marca')->nullable()->change();
          $table->string('modelo')->nullable()->change();
          $table->string('tag')->nullable()->change();
          $table->boolean('borrado_seguro')->nullable()->change();
          $table->string('foto')->nullable()->change();
          $table->boolean('txae')->nullable()->change();
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
          $table->string('marca')->change();
          $table->string('modelo')->change();
          $table->string('tag')->change();
          $table->boolean('borrado_seguro')->change();
          $table->string('foto')->change();
          $table->boolean('txae')->change();
      });
    }
}
