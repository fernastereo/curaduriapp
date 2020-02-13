<?php

namespace App;

use App\Curaduria;
use App\Objetolicencia;
use App\Estadoexpediente;
use Illuminate\Database\Eloquent\Model;

class Expediente extends Model
{
    protected $fillable = [
        'curaduria_id',
        'idradicacion',
        'fecharad',
        'vigencia',
        'objetolicencia_id',
        'parent_id',
        'fechacompleto',
        'nombre',
        'fechacierre',
        'estadoexpediente_id',
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

    public function parent(){
        return $this->belongsTo(Expediente::class);
    }

    public function pmr(){
        //Esta es la relacion que me permitira ver todos los expedientes hijos que tenga
        //pmr: Prorroga-Modificacion-Revalidacion
        return $this->hasMany(Expediente::class, 'parent_id');
    }
}
