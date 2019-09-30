<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Curaduria extends Model
{
    const CURADURIA_ACTIVA = 'ACTIVA';
    const CURADURIA_INACTIVA = 'INACTIVA';

    protected $fillable = [
        'num_curaduria',
        'ciudad_id',
        'curador',
        'idcurador',
        'direccion',
        'telefono',        
        'email',
        'fechaini',
        'status'
    ];

    public function estaActiva(){
        return $this->status == Curaduria::CURADURIA_ACTIVA;
    }
}
