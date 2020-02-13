<?php

namespace App;

use App\Expediente;
use Illuminate\Database\Eloquent\Model;

class Estadoexpediente extends Model
{
    const ESTADO_ACTIVO = 1;
    const ESTADO_INACTIVO = 0;

    protected $fillable = [
        'nombre',
        'estado'
    ];

    public function expedientes(){
        return $this->hasMany(Expediente::class);
    }

    public function estaActivo(){
        return $this->estado == Estadoexpediente::ESTADO_ACTIVO;
    }
}
