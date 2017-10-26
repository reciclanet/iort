<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMaterialsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('materiales', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre');
            $table->integer('peso');
            $table->timestamps();
        });

        $materiales = [
          ['id' => 1, 'nombre' => 'CPU', 'peso' => 1000],
          ['id' => 2, 'nombre' => 'Portátil', 'peso' => 1000],
          ['id' => 3, 'nombre' => 'Impresora', 'peso' => 1000],
          ['id' => 4, 'nombre' => 'Monitor Plano', 'peso' => 1000],
          ['id' => 5, 'nombre' => 'Monitor CRT', 'peso' => 1000],
          ['id' => 6, 'nombre' => 'Servidor', 'peso' => 1000],
          ['id' => 7, 'nombre' => 'Escaner', 'peso' => 1000],
          ['id' => 8, 'nombre' => 'Switch', 'peso' => 1000],
          ['id' => 9, 'nombre' => 'Router', 'peso' => 1000],
          ['id' => 10, 'nombre' => 'SAI', 'peso' => 1000],
          ['id' => 11, 'nombre' => 'Altavoces', 'peso' => 1000],
          ['id' => 12, 'nombre' => 'Móvil', 'peso' => 1000],
          ['id' => 13, 'nombre' => 'Tablet', 'peso' => 1000],
          ['id' => 14, 'nombre' => 'Teclado', 'peso' => 1000],
          ['id' => 15, 'nombre' => 'Ratón', 'peso' => 1000],
          ['id' => 16, 'nombre' => 'Smartphone', 'peso' => 1000],
          ['id' => 17, 'nombre' => 'Libro Electrónico', 'peso' => 1000],
          ['id' => 18, 'nombre' => 'Webcam', 'peso' => 1000],
          ['id' => 19, 'nombre' => 'Teléfono Inalámbrico', 'peso' => 1000],
        ];

        DB::table('materiales')->insert($materiales);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('materiales');
    }
}
