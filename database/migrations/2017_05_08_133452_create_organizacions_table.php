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
            $table->string('actividad_principal');
            $table->string('cif_nif');
            $table->smallInteger('forma_juridica_id' );
            $table->string('email');
            $table->string('telefono_1');
            $table->string('telefono_2');
            $table->string('pagina_web');
            $table->boolean('autoriza_logo');
            $table->string('direccion');
            $table->string('cp');
            $table->string('poblacion');
            $table->string('provincia');
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
