<?php

namespace App\Http\Controllers;

use App\Models\Banda;
use Illuminate\Http\Request;
use App\Models\Representante;
use Illuminate\Support\Facades\Storage;


class BandaController extends Controller
{



    public function lista(Request $request)
    {
        $banda = Banda::orderBy('id', 'DESC')->paginate(100);
        return view('producto.banda', compact('banda'));
    }




    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
{
    //$banda = Banda::orderBy('id', 'DESC')->paginate(3);
    $banda = Banda::paginate(5);
    
    
    
    return view('producto.banda', ['banda' => $banda]);
}


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $representantes = Representante::pluck('nombre', 'id');
        return view('formularioVista.crearBanda', compact('representantes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        // Obtener los datos del formulario
        $nombre = $request->input('nombre');
        $representanteId = $request->input('representante');
        $imagen = $request->file('imagen');

        // Guardar la imagen en el sistema de archivos
        $imagenNombre = $imagen->getClientOriginalName();
        $imagen->storeAs('public', $imagenNombre);

        // Crear una nueva instancia del modelo Banda
        $banda = new Banda();
        $banda->nombre = $nombre;
        $banda->imagen = Storage::url($imagenNombre); // Guardar la URL de la imagen en la base de datos
        $banda->representante_id = $representanteId;
        

        
        // Guardar la banda en la base de datos
        $banda->save();
       

        // Redirigir a una página de éxito o mostrar un mensaje de éxito
        return redirect('/banda/lista')->with('mensaje', 'Banda creada exitosamente.');
    
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
        $banda = Banda::findOrFail($id);
        $representantes = Representante::pluck('nombre', 'id');

        return view('formularioVista.editarBanda', compact('banda', 'representantes'));

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
        // Validar los datos ingresados en el formulario de edición
    $request->validate([
        'nombre' => 'required',
        'imagen' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        'representante' => 'required',
    ]);

    // Obtener los datos del formulario
    $nombre = $request->input('nombre');
    $representanteId = $request->input('representante');
    $imagen = $request->file('imagen');

    // Buscar la banda por su ID
    $banda = Banda::findOrFail($id);

    // Actualizar los datos de la banda
    $banda->nombre = $nombre;
    $banda->representante_id = $representanteId;

    // Si se proporciona una nueva imagen, guardarla en el sistema de archivos
    if ($imagen) {
        $imagenNombre = $imagen->getClientOriginalName();
        $imagen->storeAs('public', $imagenNombre);
        $banda->imagen = Storage::url($imagenNombre);
    }

    // Guardar los cambios en la base de datos
    $banda->save();

    // Redirigir a la lista de banda con un mensaje de éxito
    return redirect('/banda/lista')->with('mensaje', 'Banda actualizada exitosamente.');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // Buscar la banda por su ID
        $banda = Banda::findOrFail($id);

        // Eliminar la imagen asociada en el sistema de archivos
        Storage::delete($banda->imagen);

        // Eliminar el registro de la banda de la base de datos
        $banda->delete();

        // Redirigir a la lista de banda con un mensaje de éxito
        return redirect('/banda/lista')->with('mensaje', 'Banda eliminada exitosamente.');
    
    }
}
