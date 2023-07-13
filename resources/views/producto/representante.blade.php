@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-body">
        <div class="container">

            @if(Auth::check())
                @if(Session::has('mensaje'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>{{ Auth::user()->name }}</strong>
                        {{ Session::get('mensaje') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
            @endif

            <h1>Representante</h1>
        @role('administrador')
            <a class="btn btn-success" href="{{ url('/representante/create') }}">Registrar nuevo producto</a>
        @endrole
            <br>
            <br>
            <div class="card">
                <table class="table table-bordered">
                    <thead class="thead-light">
                        <tr>
                            <th>Nombre</th>
                            <th>Email</th>
                            <th>Contacto</th>
                            @role('administrador')
                            <th>Acciones</th>
                            @endrole
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($representante as $rep)
                            <tr>
                                <td>{{ $rep->nombre }}</td>
                                <td>{{ $rep->email }}</td>
                                <td>{{ $rep->contacto }}</td>
                                <td>
                                @role('administrador')
                                    <!-- editar -->
                                    <a class="btn btn-warning" href="{{ url('/representante/editar', $rep->id) }}">Editar</a>
                                
                                    <!-- borrar -->
                                    <form action="{{ route('representante.destroy', $rep->id) }}" class="d-inline" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <input class="btn btn-danger" type="submit" onclick="return confirm('¿Quieres borrar?')" value="Borrar">
                                    </form>
                                @endrole    
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection