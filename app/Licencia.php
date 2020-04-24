<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Licencia extends Model
{
    const LICENCIA_ACTIVO = 1;
    const LICENCIA_INACTIVO = 0;

    const LICENCIA = "L";
    const ACTUACION = "A";
    const OTRASACTUACIONES = "O";
    
    protected $fillable = ['nombre', 'abrev', 'estado'];

    public function modalidads(){
        return $this->hasMany(Modalidad::class);
    }

    public function estaActivo(){
        return $this->estado == Licencia::LICENCIA_ACTIVO;
    }
}
