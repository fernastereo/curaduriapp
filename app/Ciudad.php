<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ciudad extends Model
{
    protected $fillable = [
        'nombre',
        'idciudad',
        'departamento_id',
    ];

    public function curadurias(){
        return $this->hasMany(Curaduria::class);
    }

    public function departamento(){
        return $this->belongsTo(Departamento::class);
    }
}
