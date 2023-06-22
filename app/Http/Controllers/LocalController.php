<?php

namespace App\Http\Controllers;

use App\Models\Local;
use Illuminate\Http\Request;

class LocalController extends Controller
{



    public function lista()
    {
        $datos['local']=Local::orderBy('id', 'DESC')->paginate()->all();
        return view('local.localLista', $datos);
    }



    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('local.local');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('formularioVista.crearLocal');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();

        // creacion de una nueva instancia
        $local = new Local;
        $local->nombre = $data['nombre'];
        $local->direccion = $data['direccion'];

        // Guarda el local en la base de datos
        $local->save();

        // redirige a una pagina guardado con exito
        return redirect()->back()->with('success', 'Los datos se han guardado correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\local  $local
     * @return \Illuminate\Http\Response
     */
    public function show(local $local)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\local  $local
     * @return \Illuminate\Http\Response
     */
    public function edit(local $local)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\local  $local
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, local $local)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\local  $local
     * @return \Illuminate\Http\Response
     */
    public function destroy(local $local)
    {
        //
    }
}
