<?php

namespace App;

use App\Curaduria;
use App\Objetolicencia;
use App\Estadoexpediente;
use Illuminate\Database\Eloquent\Model;

class Expediente extends Model
{
    protected $fillable = [
        'idradicacion',
        'vigencia',
        'fecharad',
        'fechacompleto',
        'objeto',
        'parent_id',
        'estado_id',
        'fechacierre',
        'nombre',
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
}
