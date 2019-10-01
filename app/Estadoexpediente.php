<?php

namespace App;

use App\Expediente;
use Illuminate\Database\Eloquent\Model;

class Estadoexpediente extends Model
{
    public function expedientes(){
        return $this->hasMany(Expediente::class);
    }
}
