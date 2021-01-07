<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class mascota extends Model
{
    //funcion que nos regresa el usuario dueño al que se asocia la mascota.
    public function Owner(){
        return $this->belongsTo('App\usuario');
    }
}
