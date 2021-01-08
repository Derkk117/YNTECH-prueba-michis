<?php

use Illuminate\Support\Facades\Route;

//definicion de rutas sencillas.
Route::get('/', function (){
    return view("Welcome");
});

//ruta para obtener el veterinario con más citas en el mes seleccionado.
Route::get('/most/{anio}/{mes}','CitasController@MasSolicitado');

//definicion de rutas crud a partir de las funciones de un controlador.
Route::resource('mascota', 'MascotasController');
Route::resource('usuario', 'UsuariosController');
Route::resource('cita', 'CitasController');
