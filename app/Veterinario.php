<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Veterinario extends Model
{
    //funcion que nos regresa las citas que tiene el veterinario.
    public function Citas(){
        return $this->hasMany('App\Cita');
    }
}
