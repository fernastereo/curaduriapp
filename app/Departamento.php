<?php

namespace App;

use App\Ciudad;
use Illuminate\Database\Eloquent\Model;

class Departamento extends Model
{
    public function ciudads(){
        return $this->hasMany(Ciudad::class);
    }
}
