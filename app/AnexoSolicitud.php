<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Anexosolicitud extends Model
{
    protected $fillable = ['file', 'solicitud_id'];

    public function solicitud(){
        return $this->belongsTo(Solicitud::class);
    }
}
