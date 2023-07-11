<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Evento;
use App\Models\Banda;
use App\Models\local;
use App\Models\Equipamiento;


class AgendaController extends Controller
{



    
    public function lista(Request $request)
    {
        
        $local = local::pluck('nombre', 'id');
        
        return view('producto.agenda',compact('local'));
        
        
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $local = local::pluck('nombre', 'id');
        $banda = Banda::pluck('nombre', 'id');
        return view('producto.agenda',compact('banda','local'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $local = local::pluck('nombre', 'id');
        $banda = Banda::pluck('nombre', 'id');
        $equipamiento = Equipamiento::pluck('nombre', 'id');
        return view('formularioVista.crearEvento', compact('banda', 'local', 'equipamiento'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $localId = $request->input('local');
        $bandaId = $request->input('banda');
        $equipamientoID = $request->input('equipamiento');
        $fecha = $request->input('fecha');
        $hora = $request->input('hora');

        // Crear una nueva instancia del modelo evento
        $eventos = new Evento();
        
        // Verificar si se seleccionó un representante
        if ($localId) {
            $local = Local::findOrFail($localId);
            $eventos->local()->associate($local);
        }

        // Verificar si se seleccionó una banda
        if ($bandaId) {
            $banda = Banda::findOrFail($bandaId);
            $eventos->banda()->associate($banda);
        }

        if($equipamientoID){
            $equipamiento = Equipamiento::findOrFail($equipamientoID);
            $eventos->equipamiento()->associate($equipamiento);
        }

        $eventos->fecha = $fecha;
        $eventos->hora = $hora;
        // Guardar la banda en la base de datos
        $eventos->save();
       

        // Redirigir a una página de éxito o mostrar un mensaje de éxito
        return redirect('/agenda/lista')->with('mensaje', 'Evento creada exitosamente.'); 
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $eventos = Evento::all();
        return response()->json($eventos);
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
