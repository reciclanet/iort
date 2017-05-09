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
            $table->string('apellido_1')->nullable();
            $table->string('apellido_2')->nullable();
            $table->date('fecha_nacimiento')->nullable();
            $table->string('cargo')->nullable();
            $table->smallInteger('sexo_id')->nullable();
            $table->string('direccion')->nullable();
            $table->string('cp')->nullable();
            $table->string('poblacion')->nullable();
            $table->string('provincia')->nullable();
            $table->string('email')->nullable();
            $table->string('telefono_1')->nullable();
            $table->string('telefono_2')->nullable();
            $table->string('pagina_web')->nullable();
            $table->smallInteger('tipo_conocido_id' )->unsigned()->nullable();
            $table->smallInteger('tipo_alta_id' )->unsigned()->nullable();
            $table->integer('organizacion_id' )->unsigned()->nullable();
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
