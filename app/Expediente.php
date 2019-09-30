<?php

namespace App;

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
}
