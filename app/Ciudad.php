<?php

namespace App;

use App\Curaduria;
use App\Departamento;
use Illuminate\Database\Eloquent\Model;

class Ciudad extends Model
{
    public function curadurias(){
        return $this->hasMany(Curaduria::class);
    }

    public function departamento(){
        return $this->belongsTo(Departamento::class);
    }
}
