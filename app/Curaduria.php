<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Curaduria extends Model
{
    const CURADURIA_ACTIVA = 1;
    const CURADURIA_INACTIVA = 0;

    protected $fillable = [
        'ciudad_id',
        'numero',
        'curador',
        'idcurador',
        'direccion',
        'telefono',        
        'email',
        'web',
        'logo',
        'fechaini',
        'estado'
    ];

    public function estaActiva(){
        return $this->estado == Curaduria::CURADURIA_ACTIVA;
    }

    public function generarRadicado(){
        //Esta funcion debe retornar el numero de radicado a guardar (ultimo + 1) de acuerdo a la curaduria que lo haya solicitado
        return 1;
    }

    public function ciudad(){
        return $this->belongsTo(Ciudad::class);
    }

    public function users(){
        return $this->hasMany(User::class);
    }

    public function expedientes(){
        return $this->hasMany(Expediente::class);
    }

    public function solicituds(){
        return $this->hasMany(Solicitud::class);
    }
}
