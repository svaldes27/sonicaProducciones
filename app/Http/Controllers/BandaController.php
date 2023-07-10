<?php

namespace App\Http\Controllers;

use App\Models\Banda;
use Illuminate\Http\Request;
use App\Models\Representante;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;


class BandaController extends Controller
{
    public function lista(Request $request)
    {
        $bandas = Banda::with('representante')->orderBy('id', 'DESC')->get();

        return view('producto.banda', ['bandas' => $bandas]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
        public function index()
    {
        $bandas = Banda::all();
        return view('producto.banda')->with('bandas',$bandas);
    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $representantes = Representante::pluck('nombre', 'id');
        $banda = new Banda(); 
        return view('formularioVista.crearBanda', compact('representantes','banda'));
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
        //$request->hasFile('imagen');
        $nombre = $request->input('nombre');
        $representanteId = $request->input('representante');
        $imagen = $request->file('imagen');

        // Guardar la imagen en el sistema de archivos
        $imagenNombre = $imagen->getClientOriginalName();
        $imagen->storeAs('public', $imagenNombre);

        // Crear una nueva instancia del modelo Banda
        $bandas = new Banda();
        $bandas->nombre = $nombre;
        $bandas->imagen = $imagenNombre;
        //$bandas->representante_id = $data['representante'];
        //$bandas->representante_id = $representanteId;

        // Verificar si se seleccionó un representante
        if ($representanteId) {
            $representante = Representante::findOrFail($representanteId);
            $bandas->representante()->associate($representante);
        }
        
        // Guardar la banda en la base de datos
        $bandas->save();
       

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
        $bandas = Banda::findOrFail($id);

        // Actualizar los datos de la banda
        $bandas->nombre = $nombre;
        $bandas->representante_id = $representanteId;

        // Si se proporciona una nueva imagen, guardarla en el sistema de archivos
        if ($imagen) {
            $imagenNombre = $imagen->getClientOriginalName();
            $imagen->storeAs('public', $imagenNombre);
            $bandas->imagen = $imagenNombre;
        }


        // Guardar los cambios en la base de datos
        $bandas->save();

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
        $bandas = Banda::findOrFail($id);

        // Eliminar la imagen asociada en el sistema de archivos
        Storage::delete($bandas->imagen);

        // Eliminar el registro de la banda de la base de datos
        $bandas->delete();

        // Redirigir a la lista de banda con un mensaje de éxito
        return redirect('/banda/lista')->with('mensaje', 'Banda eliminada exitosamente.');
    
    }
}
