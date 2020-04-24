<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Modalidad extends Model
{
    const MODALIDAD_ACTIVO = 1;
    const MODALIDAD_INACTIVO = 0;

    protected $fillable = ['nombre', 'abrev', 'estado'];

    public function licencia(){
        return $this->belongsTo(Licencia::class);
    }

    public function estaActivo(){
        return $this->estado == Modalidad::MODALIDAD_ACTIVO;
    }
}
