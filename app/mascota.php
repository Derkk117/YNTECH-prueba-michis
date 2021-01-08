<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class mascota extends Model
{
    //funcion que nos regresa el usuario dueño al que se asocia la mascota.
    public function Usuario(){
        return $this->belongsTo('App\Usuario');
    }

    //funcion que nos regresa las citas que tiene la mascota
    public function Citas(){
        return $this->hasMany('App\Cita');
    }
}

