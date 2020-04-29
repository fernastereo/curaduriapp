<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Objetolicencia extends Model
{
    const OBJETO_ACTIVO = 1;
    const OBJETO_INACTIVO = 0;

    protected $fillable = [
        'nombre',
        'estado'
    ];

    public function solicituds(){
        return $this->hasMany(Solicitud::class);
    }
    
    public function expedientes(){
        return $this->hasMany(Expediente::class);
    }

    public function estaActivo(){
        return $this->estado == Objetolicencia::OBJETO_ACTIVO;
    }
}
