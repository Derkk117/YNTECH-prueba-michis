<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Usuario;

class UsuariosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $usuarios = Usuario::all();
        return view('Contenido/Usuarios',compact('usuarios'));
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
        $usuario = new Usuario;
        $usuario->nombre = $request->nombre;
        $usuario->telefono = $request->telefono;
        $usuario->correo = $request->correo;

        if($usuario->nombre != "" && $usuario->telefono != "" && $usuario->correo != ""){
            $usuario->save();   //Absolute route.
            $ok = "Dueño creado correctamente.";
            return redirect()->guest('/usuario')-> with(['ok' => $ok]);
      }
      else{
          $err = "Todos los campos son requeridos.";
            
          return redirect()->guest('/usuario')->with( ['err' => $err] );
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
        //obtenemos el usuario.
        $usuario = Usuario::find($id);
        //regresamos el usuario.
        return $usuario;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
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
        $usuario = Usuario::find($id);
        $usuario->nombre = $request->nombre;
        $usuario->telefono = $request->telefono;
        $usuario->correo = $request->correo;

        if($usuario->nombre != "" && $usuario->telefono != "" && $usuario->correo != ""){
            $usuario->save();   //Absolute route.
            $ok = "Dueño actualizado correctamente.";
            return redirect()->guest('/usuario')-> with(['ok' => $ok]);
      }
      else{
          $err = "Para editar debes llenar todos los campos.";
            
          return redirect()->guest('/usuario')->with( ['err' => $err] );
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
        $delete = Usuario::destroy($id);
    }
}
