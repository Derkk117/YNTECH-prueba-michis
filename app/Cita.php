<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cita extends Model
{
    //funcion que nos regresa la mascota de la cita.
    public function Mascota(){
        return $this->belongsTo('App\Mascota');
    }

    //funcion que nos regresa el veterinario de la cita.
    public function Veterinario(){
        return $this->belongsTo('App\Veterinario');
    }
}
