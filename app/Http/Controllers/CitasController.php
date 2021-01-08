<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Veterinario;
use App\Mascota;
use App\Cita;

class CitasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $veterinarios = Veterinario::all();
        $mascotas = Mascota::all();
        $citas = Cita::all();
        return view('Contenido/Citas',compact('veterinarios','mascotas','citas'));
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
        $cita = new Cita;
        $cita->mascota_id = $request->paciente;
        $cita->veterinario_id = $request->veterinario;
        $cita->date = $request->date;

        if($cita->mascota_id != "" && $cita->veterinario_id != "" && $cita->date != ""){
            $cita->save();

            $ok = "cita creada correctamente.";
            return redirect()->guest('/cita')-> with(['ok' => $ok]);
        }
        else{
            $err = "Todos los campos son requeridos.";
            return redirect()->guest('/cita')->with( ['err' => $err] );
        }

    }

    public function MasSolicitado($anio, $mes){

        $vets = Veterinario::all();
        
        $vetMost = $vets[0];
        $mostCitas = 0;
        foreach($vets as &$vet){
            $numCitas = Cita::whereYear('date', $anio)->whereMonth('date',$mes)->where('veterinario_id',$vet->id)->get();
            $numCitas = count($numCitas);
            
            if($numCitas > $mostCitas){
                $mostCitas = $numCitas;
                $vetMost = $vet;
            }
        }

        $result = [ 
            $vetMost,
            $mostCitas
        ];
        return $result;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
