<?php

namespace App\Http\Controllers;



use App\Models\Local;
use App\Models\Provincia;
use App\Models\Comuna;
use App\Models\Region;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;



class LocalController extends Controller
{

    public function index(Request $request)
    {
        $locales = Local::with('comuna.provincia.region')->get();
        return view('producto.local', compact('locales'));
    }


        
    public function lista(Request $request)
        {
            $locales = Local::with('comuna.provincia.region')->get();
            return view('producto.local', compact('locales'));
        }
        
        

    public function create()
        {   
            $regiones = Region::pluck('region_nombre', 'region_id');
            $comunas = Comuna::pluck('comuna_nombre', 'comuna_id');
            $provincias = Provincia::pluck('provincia_nombre', 'provincia_id');
            $local = new Local;
            return view('formularioVista.crearLocal', compact('regiones','provincias','comunas','local'));
        }
        

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required',
            'direccion' => 'required',
            'comuna' => 'required',
            'provincia' => 'required',
            'region' => 'required'

        ]);

        $data = $request->all();

        $local = new Local;
        $local->nombre = $data['nombre'];
        $local->direccion = $data['direccion'];
        $local->comuna_id = $data['comuna'];
        


        $local->save();

        return redirect('/local/lista')->with('mensaje', 'Los datos se han guardado correctamente');
    }

    public function update(Request $request, $id)
    {
    $request->validate([
        'nombre' => 'required',
        'direccion' => 'required',
        'comuna' => 'required',
        'provincia' => 'required',
        'region' => 'required',
    ]);

    $local = Local::findOrFail($id);
    $local->nombre = $request->input('nombre');
    $local->direccion = $request->input('direccion');
    $local->comuna_id = $request->input('comuna');

    // Actualiza la región solo si ha cambiado
    if ($local->comuna->provincia->region->region_id != $request->input('region')) {
        $local->comuna->provincia->region()->associate($request->input('region'));
    }

    $local->save();

    return redirect('/local/lista')->with('mensaje', 'El local ha sido actualizado exitosamente.');
    }



    public function edit($id)
    {
        $local = Local::findOrFail($id);
        $regiones = Region::pluck('region_nombre', 'region_id');
        $provincias = Provincia::where('region_id', $local->comuna->provincia->region->region_id)
            ->pluck('provincia_nombre', 'provincia_id');
        $comunas = Comuna::where('provincia_id', $local->comuna->provincia->provincia_id)
            ->pluck('comuna_nombre', 'comuna_id');
    
        return view('formularioVista.editarLocal', compact('local', 'regiones', 'provincias', 'comunas'));
    }
    



    public function getProvincias(Request $request)
    {
        $provincias = Provincia::where('region_id', $request->region_id)->pluck('provincia_nombre', 'provincia_id');
        return view('partials.provincias', compact('provincias'));
    }

    public function getComunas(Request $request)
    {
        $comunas = Comuna::where('provincia_id', $request->provincia_id)->pluck('comuna_nombre', 'comuna_id');
        return view('partials.comunas', compact('comunas'));
    }


      public function show($id)
    {
        $local = Local::findOrFail($id);
        return view('formularioVista.formLocal', compact('local'));
    }

    public function destroy($id)
    {
        $local = Local::findOrFail($id);
        $local->delete();
    
        return redirect('/local/lista')->with('mensaje', 'El Local ha sido eliminado correctamente.');
    }
    


}

