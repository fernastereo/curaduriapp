<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Solicitante extends Model
{
    protected $fillable = ['identificacion', 'dv', 'nombre', 'telefono', 'email'];
    
    public function solicituds(){
        return $this->hasMany(Solicitud::class);
    }
}
