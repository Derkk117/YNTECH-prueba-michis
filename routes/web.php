<?php

use Illuminate\Support\Facades\Route;

//definicion de rutas sencillas.
Route::get('/', function (){
    return view("Welcome");
});

//definicion de rutas crud a partir de las funciones de un controlador.
Route::resource('mascota', 'MascotasController');
Route::resource('usuario', 'UsuariosController');
