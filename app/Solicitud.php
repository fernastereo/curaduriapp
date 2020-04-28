<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Solicitud extends Model
{
    protected $fillable = [
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

    public function solicitante(){
        return $this->belongsTo(Solicitante::class);
    }

    public function modalidad(){
        return $this->belongsTo(Modalidad::class);
    }

    public function objetolicencia(){
        return $this->belongsTo(Objetolicencia::class);
    }
}