<?php

namespace App;

use App\Ciudad;
use Illuminate\Database\Eloquent\Model;

class Departamento extends Model
{
    protected $fillable = [
        'nombre',
        'iddepartamento'
    ];
    
    public function ciudads(){
        return $this->hasMany(Ciudad::class);
    }
}
