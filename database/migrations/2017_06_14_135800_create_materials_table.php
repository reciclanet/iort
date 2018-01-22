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
            $table->boolean('genera_numero')->default(0);
            $table->timestamps();
        });

        $materiales = [
          ['id' => 1, 'nombre' => 'CPU', 'peso' => 1000, 'genera_numero' => true],
          ['id' => 2, 'nombre' => 'Portátil', 'peso' => 1000, 'genera_numero' => true],
          ['id' => 3, 'nombre' => 'Impresora', 'peso' => 1000, 'genera_numero' => true],
          ['id' => 4, 'nombre' => 'Monitor Plano', 'peso' => 1000, 'genera_numero' => true],
          ['id' => 5, 'nombre' => 'Monitor CRT', 'peso' => 1000,'genera_numero' => false],
          ['id' => 6, 'nombre' => 'Servidor', 'peso' => 1000, 'genera_numero' => true],
          ['id' => 7, 'nombre' => 'Escaner', 'peso' => 1000, 'genera_numero' => true],
          ['id' => 8, 'nombre' => 'Switch', 'peso' => 1000, 'genera_numero' => true],
          ['id' => 9, 'nombre' => 'Router', 'peso' => 1000,'genera_numero' => false],
          ['id' => 10, 'nombre' => 'SAI', 'peso' => 1000, 'genera_numero' => true],
          ['id' => 11, 'nombre' => 'Altavoces', 'peso' => 1000,'genera_numero' => false],
          ['id' => 12, 'nombre' => 'Móvil', 'peso' => 1000,'genera_numero' => false],
          ['id' => 13, 'nombre' => 'Tablet', 'peso' => 1000,'genera_numero' => false],
          ['id' => 14, 'nombre' => 'Teclado', 'peso' => 1000,'genera_numero' => false],
          ['id' => 15, 'nombre' => 'Ratón', 'peso' => 1000,'genera_numero' => false],
          ['id' => 16, 'nombre' => 'Smartphone', 'peso' => 1000,'genera_numero' => false],
          ['id' => 17, 'nombre' => 'Libro Electrónico', 'peso' => 1000,'genera_numero' => false],
          ['id' => 18, 'nombre' => 'Webcam', 'peso' => 1000,'genera_numero' => false],
          ['id' => 19, 'nombre' => 'Teléfono Inalámbrico', 'peso' => 1000,'genera_numero' => false],
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
