<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Representante;
use Illuminate\Support\facades\Storage;
use Illuminate\Support\Facades\Auth;

class RepresentanteController extends Controller
{
    public function index()
{
    $representantes = Representante::paginate(10);

    return view('producto.representante')->with('representantes',$representantes);
}


    public function create()
    {
        return view('formularioVista.crearRepresentante ');
    }

    public function store(Request $request)
    {
        // Validar los datos ingresados en el formulario
        $request->validate([
            'nombre' => 'required',
            'email' => 'required|email',
            'contacto' => 'required',
        ]);

        // Obtener los datos del formulario
        $nombre = $request->input('nombre');
        $email = $request->input('email');
        $contacto = $request->input('contacto');

        // Crear una nueva instancia del modelo Representante
        $representante = new Representante();
        $representante->nombre = $nombre;
        $representante->email = $email;
        $representante->contacto = $contacto;

        // Guardar los datos en la base de datos
        $representante->save();

        // Redirigir a una página de éxito o mostrar un mensaje de éxito
        return redirect('/representante/lista')->with('mensaje', 'Representante creado exitosamente.');
    }

    public function show($id)
    {
        //
    }
    public function lista(Request $request)
    {   

        //trae los datos de la base de datos
        $representante = Representante::all();
        
        return view('producto.representante', ['representante' => $representante]);

       

        //return view('producto.representante', $datos);

    }

    public function edit($id)
    {
        $representante = Representante::findOrFail($id);
        return view('formularioVista.editarRepresentante', compact('representante'));
    }

    public function update(Request $request, $id)
    {
        // Validar los datos ingresados en el formulario de edición
        $request->validate([
            'nombre' => 'required',
            'email' => 'required',
            'contacto' => 'required',
        ]);
    
        // Obtener los datos del formulario
        $nombre = $request->input('nombre');
        $email = $request->input('email');
        $contacto = $request->input('contacto');
    
        // Buscar el representante por su ID
        $representante = Representante::findOrFail($id);
    
        // Actualizar los datos del representante
        $representante->nombre = $nombre;
        $representante->email = $email;
        $representante->contacto = $contacto;
    
        // Guardar los cambios en la base de datos
        $representante->save();
    
        // Redirigir a la lista de representantes con un mensaje de éxito
        return redirect('/representante/lista')->with('mensaje', 'El representante ha sido actualizado correctamente.');
    }
    
    public function destroy($id)
    {
        $representante = Representante::findOrFail($id);
        $representante->delete();
    
        return redirect('/representante/lista')->with('mensaje', 'El representante ha sido eliminado correctamente.');
    }
    

}