<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $fillable = ['nombre'];

    public function organizaciones()
    {
      return $this->belongsToMany(Organizacion::class);
    }

    public function getRouteKeyName()
    {
      return 'nombre';
    }
}
