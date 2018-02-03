<?php

namespace App;

use Illuminate\Database\Eloquent\Model as Eloquent;

class Model extends Eloquent
{
    // Array con los campos que no se pueden asignar masivamente
    protected $guarded = [];
}
