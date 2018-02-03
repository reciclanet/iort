<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\Persona;
use App\Organizacion;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        factory(Persona::class, 10)->create();
        factory(Organizacion::class, 20)->create();

        Model::reguard();
    }
}
