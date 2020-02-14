<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tipoproyecto extends Model
{
    const TIPOPROYECTO_ACTIVO = 1;
    const TIPOPROYECTO_INACTIVO = 0;

    protected $fillable = ['nombre', 'estado'];

    public function expedientes(){
        return $this->hasMany(Expediente::class);
    }
}
