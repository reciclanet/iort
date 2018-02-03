<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLoteMaterialsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lote_materiales', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('lote_id')->unsigned();
            $table->integer('material_id')->unsigned();
            $table->integer('cantidad')->unsigned();
            $table->integer('material_estado_id')->unsigned();
            $table->string('marca');
            $table->string('modelo');
            $table->string('tag');
            $table->boolean('borrado_seguro');
            $table->string('foto');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('lote_materiales');
    }
}
