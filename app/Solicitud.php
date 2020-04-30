<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Solicitud extends Model
{
    protected $fillable = [
        'curaduria_id',
        'objetolicencia_id',
        'licenciaanteriornumero',
        'licenciaanteriorvigencia',
        'modalidad_id',
        'solicitante_id',
        'descripcion',
        'anexos',
        'token',
    ];

    public function verified(){
        return $this->token === null;
    }

    public function curaduria(){
        return $this->belongsTo(Curaduria::class);
    }

    public function solicitante(){
        return $this->belongsTo(Solicitante::class);
    }

    public function modalidad(){
        return $this->belongsTo(Modalidad::class);
    }

    public function objetolicencia(){
        return $this->belongsTo(Objetolicencia::class);
    }

    public function anexosolicituds(){
        return $this->hasMany(AnexoSolicitud::class);
    }
}
