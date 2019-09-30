<?php

namespace App;

use App\Ciudad;
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

    public function generarRadicado(){
        //Esta funcion debe retornar el numero de radicado a guardar (ultimo + 1) de acuerdo a la curaduria que lo haya solicitado
        return 1;
    }

    public function ciudad(){
        return $this->belongsTo(Ciudad::class);
    }
}
