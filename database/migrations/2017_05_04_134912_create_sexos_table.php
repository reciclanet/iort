<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSexosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sexos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre');
        });

        $sexos = [
          ['id' => 1, 'nombre' => 'Hombre'],
          ['id' => 2, 'nombre' => 'Mujer'],
        ];

        DB::table('sexos')->insert($sexos);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sexos');
    }
}
