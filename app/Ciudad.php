<?php

namespace App;

use App\Curaduria;
use Illuminate\Database\Eloquent\Model;

class Ciudad extends Model
{
    public function curadurias(){
        return $this->hasMany(Curaduria::class);
    }
}
