<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Equipamiento;
use App\Models\Banda;

class EquipamientoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $equipamientos = Equipamiento::all();
        $bandas = Banda::all();
        return view('producto.equipamiento', compact('equipamientos', 'bandas'));
    }

    public function lista(Request $request)
    {
        $equipamientos = Equipamiento::all();
        return view('producto.equipamiento', compact('equipamientos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        $equipamiento = new Equipamiento;
        return view('formularioVista.crearEquipamiento', compact('equipamiento'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required',
            'descripcion' => 'nullable',
            'cantidad' => 'required|integer',
            'tipo' => 'required',
            'guitarras' => 'nullable|integer',
            'baterias' => 'nullable|integer',
            'otros_instrumentos' => 'nullable',
            'requisitos_iluminacion' => 'nullable',
            'requisitos_especiales' => 'nullable',
        ]);

        $equipamiento = new Equipamiento();
        $equipamiento->nombre = $request->nombre;
        $equipamiento->descripcion = $request->descripcion;
        $equipamiento->cantidad = $request->cantidad;
        $equipamiento->tipo = $request->tipo;
        $equipamiento->guitarras = $request->guitarras;
        $equipamiento->baterias = $request->baterias;
        $equipamiento->otros_instrumentos = $request->otros_instrumentos;
        $equipamiento->requisitos_iluminacion = $request->requisitos_iluminacion;
        $equipamiento->requisitos_especiales = $request->requisitos_especiales;
        $equipamiento->save();

        return redirect('/equipamiento/lista')->with('success', 'Equipamiento creado exitosamente.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Equipamiento  $equipamiento
     * @return \Illuminate\Http\Response
     */
    public function show(Equipamiento $equipamiento)
    {   
        return view('equipamiento.show', compact('equipamiento'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Equipamiento  $equipamiento
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $equipamiento = Equipamiento::findOrFail($id);
        return view('formularioVista.editarEquipamiento', compact('equipamiento'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Equipamiento  $equipamiento
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nombre' => 'required',
            'descripcion' => 'nullable',
            'cantidad' => 'required|integer',
            'tipo' => 'required',
            'guitarras' => 'nullable|integer',
            'baterias' => 'nullable|integer',
            'otros_instrumentos' => 'nullable',
            'requisitos_iluminacion' => 'nullable',
            'requisitos_especiales' => 'nullable',
        ]);

        $equipamiento = Equipamiento::findOrFail($id);
        $equipamiento->nombre = $request->nombre;
        $equipamiento->descripcion = $request->descripcion;
        $equipamiento->cantidad = $request->cantidad;
        $equipamiento->tipo = $request->tipo;
        $equipamiento->guitarras = $request->guitarras;
        $equipamiento->baterias = $request->baterias;
        $equipamiento->otros_instrumentos = $request->otros_instrumentos;
        $equipamiento->requisitos_iluminacion = $request->requisitos_iluminacion;
        $equipamiento->requisitos_especiales = $request->requisitos_especiales;
        $equipamiento->save();

        return redirect('/equipamiento/lista')->with('mensaje', 'Equipamiento actualizado exitosamente.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Equipamiento  $equipamiento
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $equipamiento = Equipamiento::findOrFail($id);
        $equipamiento->delete();

        return redirect('/equipamiento/lista')->with('success', 'Equipamiento eliminado exitosamente.');
    }

    public function listaBanda(Request $request)
    {
        $bandas = Banda::all();
        return view('producto.equipamiento')->with('bandas',$bandas);
    }
}

