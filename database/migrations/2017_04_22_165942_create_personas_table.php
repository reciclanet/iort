<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePersonasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('personas', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre');
            $table->string('apellido_1');
            $table->string('apellido_2');
            $table->date('fecha_nacimiento');
            $table->string('cargo');
            $table->smallInteger('sexo_id');
            $table->string('direccion');
            $table->string('cp');
            $table->string('poblacion');
            $table->string('provincia');
            $table->string('email');
            $table->string('telefono_1');
            $table->string('telefono_2');
            $table->string('pagina_web');
            $table->smallInteger('tipo_conocido_id' );
            $table->smallInteger('tipo_alta_id' );
            $table->integer('organizacion_id' );
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
        Schema::dropIfExists('personas');
    }
}
