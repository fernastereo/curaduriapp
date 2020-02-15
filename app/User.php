<?php

namespace App;

use App\Curaduria;
use Illuminate\Support\Str;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    const USUARIO_VERIFICADO = 1;
    const USUARIO_NO_VERIFICADO = 0;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 
        'email', 
        'password', 
        'verified', 
        'verification_token', 
        'curaduria_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 
        'remember_token', 
        'verification_token'
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    //Mutador para que el campo nombre se guarde en minusculas
    public function setNameAttribute($value){
        $this->attributes['name'] = strtolower($value);
    }

    //Accesor para que el campo nombre se muestre con mayuscula inicial a pesar de que se haya guardado todo en minusculas
    public function getNameAttribute($value){
        return ucwords($value);
    }

    public function esUsuarioVerificado(){
        return $this->verified == User::USUARIO_VERIFICADO;
    }

    public static function generarVerificationToken(){
        //Estatico porque no necesitamos una instancia de User para ejecutar este metodo
        return Str::random(40);
    }

    public function curaduria(){
        return $this->belongsTo(Curaduria::class);
    }
}