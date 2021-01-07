<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mascota;
use App\Usuario;

class MascotasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $usuarios = Usuario::all();
        $mascotas = Mascota::all();
        return view('Contenido/Mascotas',compact('mascotas','usuarios'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $mascota = new Mascota;
        
        //obtenemos todos los datos de la mascota enviados en el formulario.
        $mascota->usuario_id = Usuario::where('correo',$request->dueño)->get()[0]->id;
        $mascota->nombre = $request->nombre;
        
        //verificamos cual es el valor seleccionado y asignamos el valor equivalente
        switch($request->tipo){
            case 1:
                $mascota->tipo = "Perro";
                break;
            case 2:
                $mascota->tipo = "Gato";
                break;
            case 3:
                $mascota->tipo = "Ave";
                break;
            case 4:
                $mascota->tipo = "Roedor";
                break;
            default: 
                $mascota->tipo = "Perro";
                break;
        }
        
        $mascota->edad = $request->edad;

        //verificamos cual es el valor seleccionado y asignamos el valor equivalente
        if($request->sexo == 1){
            $mascota->sexo = "Macho";
        }else{
            $mascota->sexo = "Hembra";
        }
        $mascota->peso = $request->peso;

        if($mascota->usuario_id != "" && $mascota->nombre != ""&& $mascota->tipo != ""&& $mascota->edad != ""
        && $mascota->sexo != ""&& $mascota->peso != ""){
            $mascota->save();
            $ok = "Mascota creada correctamente.";
            return redirect()->guest('/mascota')-> with(['ok' => $ok]);
      }
      else{
          $err = "Todos los campos son requeridos.";
          return redirect()->guest('/mascota')->with( ['err' => $err] );
      }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $mascota = Mascota::find($id);
        return $mascota;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $mascota = Mascota::find($id);
        
        //obtenemos todos los datos de la mascota enviados en el formulario.
        $mascota->usuario_id = $request->dueño;
        $mascota->nombre = $request->nombre;
        
        //verificamos cual es el valor seleccionado y asignamos el valor equivalente
        switch($request->tipo){
            case 1:
                $mascota->tipo = "Perro";
                break;
            case 2:
                $mascota->tipo = "Gato";
                break;
            case 3:
                $mascota->tipo = "Ave";
                break;
            case 4:
                $mascota->tipo = "Roedor";
                break;
            default: 
                $mascota->tipo = "Perro";
                break;
        }
        
        $mascota->edad = $request->edad;

        //verificamos cual es el valor seleccionado y asignamos el valor equivalente
        if($request->sexo == 1){
            $mascota->sexo = "Macho";
        }else{
            $mascota->sexo = "Hembra";
        }
        $mascota->peso = $request->peso;

        if($mascota->usuario_id != "" && $mascota->nombre != ""&& $mascota->tipo != ""&& $mascota->edad != ""
        && $mascota->sexo != ""&& $mascota->peso != ""){
            $mascota->save();
            $ok = "Mascota actualizada correctamente.";
            return redirect()->guest('/mascota')-> with(['ok' => $ok]);
      }
      else{
          $err = "Todos los campos son requeridos.";
          return redirect()->guest('/mascota')->with( ['err' => $err] );
      }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete = Mascota::destroy($id);
    }
}
