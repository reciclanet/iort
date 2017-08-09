<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrganizacionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('organizaciones', function (Blueprint $table) {
            $table->increments('id');
            $table->string('razon_social');
            $table->string('actividad_principal')->nullable();
            $table->string('cif_nif')->nullable();
            $table->smallInteger('forma_juridica_id')->unsigned()->nullable();
            $table->string('email')->nullable();
            $table->string('telefono_1')->nullable();
            $table->string('telefono_2')->nullable();
            $table->string('pagina_web')->nullable();
            $table->boolean('autoriza_logo')->nullable();
            $table->string('direccion')->nullable();
            $table->string('cp')->nullable();
            $table->string('poblacion')->nullable();
            $table->string('provincia_cod')->nullable();
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
        Schema::dropIfExists('organizaciones');
    }
}
