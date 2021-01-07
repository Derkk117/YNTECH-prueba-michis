<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class usuario extends Model
{
    //funcion que nos regresa las mascotas asociadas al usuario.
    public function Mascotas(){
        return $this->hasMany('App\Mascota');
    }
}
