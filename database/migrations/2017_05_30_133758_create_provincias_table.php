<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProvinciasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('provincias', function (Blueprint $table) {
          $table->string('cod');
          $table->string('nombre');
        });

        $provincias = [
          ['cod' => '01', 'nombre' => 'Araba/Álava'],
          ['cod' => '02', 'nombre' => 'Albacete'],
          ['cod' => '03', 'nombre' => 'Alicante/Alacant'],
          ['cod' => '04', 'nombre' => 'Almería'],
          ['cod' => '05', 'nombre' => 'Ávila'],
          ['cod' => '06', 'nombre' => 'Badajoz'],
          ['cod' => '07', 'nombre' => 'Balears, Illes'],
          ['cod' => '08', 'nombre' => 'Barcelona'],
          ['cod' => '09', 'nombre' => 'Burgos'],
          ['cod' => '10', 'nombre' => 'Cáceres'],
          ['cod' => '11', 'nombre' => 'Cádiz'],
          ['cod' => '12', 'nombre' => 'Castellón/Castelló'],
          ['cod' => '13', 'nombre' => 'Ciudad Real'],
          ['cod' => '14', 'nombre' => 'Córdoba'],
          ['cod' => '15', 'nombre' => 'Coruña, A'],
          ['cod' => '16', 'nombre' => 'Cuenca'],
          ['cod' => '17', 'nombre' => 'Girona'],
          ['cod' => '18', 'nombre' => 'Granada'],
          ['cod' => '19', 'nombre' => 'Guadalajara'],
          ['cod' => '20', 'nombre' => 'Gipuzkoa'],
          ['cod' => '21', 'nombre' => 'Huelva'],
          ['cod' => '22', 'nombre' => 'Huesca'],
          ['cod' => '23', 'nombre' => 'Jaén'],
          ['cod' => '24', 'nombre' => 'León'],
          ['cod' => '25', 'nombre' => 'Lleida'],
          ['cod' => '26', 'nombre' => 'Rioja, La'],
          ['cod' => '27', 'nombre' => 'Lugo'],
          ['cod' => '28', 'nombre' => 'Madrid'],
          ['cod' => '29', 'nombre' => 'Málaga'],
          ['cod' => '30', 'nombre' => 'Murcia'],
          ['cod' => '31', 'nombre' => 'Navarra'],
          ['cod' => '32', 'nombre' => 'Ourense'],
          ['cod' => '33', 'nombre' => 'Asturias'],
          ['cod' => '34', 'nombre' => 'Palencia'],
          ['cod' => '35', 'nombre' => 'Palmas, Las'],
          ['cod' => '36', 'nombre' => 'Pontevedra'],
          ['cod' => '37', 'nombre' => 'Salamanca'],
          ['cod' => '38', 'nombre' => 'Santa Cruz de Tenerife'],
          ['cod' => '39', 'nombre' => 'Cantabria'],
          ['cod' => '40', 'nombre' => 'Segovia'],
          ['cod' => '41', 'nombre' => 'Sevilla'],
          ['cod' => '42', 'nombre' => 'Soria'],
          ['cod' => '43', 'nombre' => 'Tarragona'],
          ['cod' => '44', 'nombre' => 'Teruel'],
          ['cod' => '45', 'nombre' => 'Toledo'],
          ['cod' => '46', 'nombre' => 'Valencia/València'],
          ['cod' => '47', 'nombre' => 'Valladolid'],
          ['cod' => '48', 'nombre' => 'Bizkaia'],
          ['cod' => '49', 'nombre' => 'Zamora'],
          ['cod' => '50', 'nombre' => 'Zaragoza'],
          ['cod' => '51', 'nombre' => 'Ceuta'],
          ['cod' => '52', 'nombre' => 'Melilla'],
        ];

        DB::table('provincias')->insert($provincias);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('provincias');
    }
}
