<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RepresentanteController extends Controller
{


    
    public function lista(Request $request)
    {
        //$categoriaId = $request->categoria;
       // $datos['productos'] = null;
        //if($categoriaId){
            
          //  $datos['productos']=producto::select('*')->where('categoria', '=',  $categoriaId )->orderBy('id', 'DESC')->paginate('100');
        //}
        //else{
          //  $datos['productos']=producto::select('*')->orderBy('id', 'DESC')->paginate('100');
        //}
        
        return view('producto.representante');
        
    }



    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        //
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
