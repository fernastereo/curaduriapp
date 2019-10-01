<?php

namespace App;

use App\Expediente;
use Illuminate\Database\Eloquent\Model;

class Objetolicencia extends Model
{
    public function expedientes(){
        return $this->hasMany(Expediente::class);
    }
}
