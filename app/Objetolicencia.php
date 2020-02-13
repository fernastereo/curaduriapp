<?php

namespace App;

use App\Expediente;
use Illuminate\Database\Eloquent\Model;

class Objetolicencia extends Model
{
    const OBJETO_ACTIVO = 1;
    const OBJETO_INACTIVO = 0;

    protected $fillable = [
        'nombre',
        'estado'
    ];

    public function expedientes(){
        return $this->hasMany(Expediente::class);
    }

    public function estaActivo(){
        return $this->estado == Objetolicencia::OBJETO_ACTIVO;
    }
}
