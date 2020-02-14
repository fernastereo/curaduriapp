<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Expediente extends Model
{
    const EXPEDINTE_SIN_ESTADO = 0;

    protected $fillable = [
        'curaduria_id',
        'idradicacion',
        'fecharad',
        'objetolicencia_id',
        'parent_id',
        'fechacompleto',
        'nombreproyecto',
        'fechacierre',
        'estadoexpediente_id',
        'tipoproyecto_id',
    ];

    public function curaduria(){
        return $this->belongsTo(Curaduria::class);
    }

    public function objetolicencia(){
        return $this->belongsTo(Objetolicencia::class);
    }

    public function estadoexpediente(){
        return $this->belongsTo(Estadoexpediente::class);
    }

    public function tipoproyecto(){
        return $this->belongsTo(Tipoproyecto::class);
    }

    public function parent(){
        return $this->belongsTo(Expediente::class);
    }

    public function pmr(){
        //Esta es la relacion que me permitira ver todos los expedientes hijos que tenga
        //pmr: Prorroga-Modificacion-Revalidacion
        return $this->hasMany(Expediente::class, 'parent_id');
    }
}
