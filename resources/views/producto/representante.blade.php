@extends('layouts.app')

@section('content')

<div class="container">

@if(Session::has('mensaje'))
<div class="alert alert-success">
{{session('mensaje')}}
<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">


    </button>

</div>
@endif
<h1>Representante</h1>

<a class="btn btn-success" href="{{ url('/representante/create') }}">Registrar nuevo producto </a>
<br>
<br>
<table class="table table-light">
    <thead class="thead-light">
        <tr>

            <td>Nombre</td>
            <td>Email</td>
            <td>Contacto</td>
            <td>acciones</td>

        </tr>
    </thead>
    <tbody>
       
        <tr>
            @foreach ($representante as $representante)
                <td>{{$representante->nombre}}</td>
                <td>{{$representante->email}}</td>
                <td>{{$representante->contacto}}</td>
            
                
        
            <td>
             <!--editar-->
                <a class="btn btn-warning"  href="{{ url( '/representante/editar/'.$representante->id) }}">editar</a>

                <!--borrar-->
                <form action="{{ route('representante.destroy', $representante->id) }}" class="d-inline" method="post">
                    @csrf
                    {{ method_field('DELETE')}}
                    <input class="btn btn-danger"  type="submit" onclick="return confirm(' ¿Quieres borrar?')" value="Borrar">
                </form>
            </td>
        </tr>
            @endforeach
    </tbody>
</table>
</div>
@endsection
