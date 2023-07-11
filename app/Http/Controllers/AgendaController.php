<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Evento;
use App\Models\Banda;
use App\Models\local;

class AgendaController extends Controller
{



    
    public function lista(Request $request)
    {
        
        
        return view('producto.agenda');
        
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('producto.agenda');
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
        return view('formularioVista.crearEvento', compact('banda', 'local'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //obtener input del formulario views/formularioVista/formEvento
        // Obtener los datos del formulario
        //$request->hasFile('imagen');
        //local banda
        $localId = $request->input('local');
        $bandaId = $request->input('banda');
        $fecha = $request->input('fecha');

        // Crear una nueva instancia del modelo evento
        $eventos = new Evento();
        //$bandas->representante_id = $data['representante'];
        //$bandas->representante_id = $representanteId;

        // Verificar si se seleccionó una banda
        if ($bandaId) {
            $banda = Banda::findOrFail($bandaId);
            $eventos->banda()->associate($banda);
        }
        // Verificar si se seleccionó un representante
        if ($localId) {
            $local = Local::findOrFail($localId);
            $eventos->local()->associate($local);
        }
        // Guardar la banda en la base de datos
        $eventos->save();
       

        // Redirigir a una página de éxito o mostrar un mensaje de éxito
        return redirect('/evento/lista')->with('mensaje', 'Evento creada exitosamente.');
        
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
