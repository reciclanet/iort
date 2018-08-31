<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use App\Lote;

class PolimorfismoALote extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::table('lotes', function (Blueprint $table) {
          $table->integer('responsable_id')->unsigned()->nullable();
          $table->string('responsable_type')->nullable();
      });

      foreach(Lote::all() as $lote) {
        if ($lote->persona_id) {
          $lote->responsable_id = $lote->persona_id;
          $lote->responsable_type = 'App\Persona';
        } else {
          $lote->responsable_id = $lote->organizacion_id;
          $lote->responsable_type = 'App\Organizacion';
        }
        $lote->save();
      }

      Schema::table('lotes', function (Blueprint $table) {
          $table->integer('responsable_id')->unsigned()->change();
          $table->string('responsable_type')->change();
      });

      Schema::table('lotes', function (Blueprint $table) {
          $table->dropColumn('persona_id');
      });

      Schema::table('lotes', function (Blueprint $table) {
          $table->dropColumn('organizacion_id');
      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
      Schema::table('lotes', function (Blueprint $table) {
          $table->integer('persona_id')->unsigned()->nullable();
          $table->integer('organizacion_id')->unsigned()->nullable();
      });

      foreach(Lote::all() as $lote) {
        if ($lote->responsable_type == 'App\Persona') {
          $lote->persona_id = $lote->responsable_id;
        } else {
          $lote->organizacion_id = $lote->responsable_id;
        }
      }

      Schema::table('lotes', function (Blueprint $table) {
          $table->dropColumn('responsable_id');
          $table->dropColumn('responsable_type');
      });
    }
}
