@extends('layouts.app')

@section('content')
<div class="card" style="border: transparent">
    <div class="card-body">
        <div class="container">
            @if(Auth::check() && Session::has('mensaje'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>{{ Auth::user()->name }}</strong>
                    {{ Session::get('mensaje') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            <h1>Local</h1>
    
            <a class="btn btn-success" href="{{ url('/local/create') }}">Registrar nuevo local</a>
            <br><br>
            
            <div class="card">
                <table class="table table-bordered">
                    <thead class="thead-light">
                    <thead>    
                        <tr>
                            <th>Nombre</th>
                            <th>Dirección</th>
                            <th>Comuna</th>
                            <th>Provincia</th>
                            <th>Región</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($locales as $local)
                            <tr>
                                <td>{{ $local->nombre }}</td>
                                <td>{{ $local->direccion }}</td>
                                <td>{{ $local->comuna->comuna_nombre }}</td>
                                <td>{{ $local->comuna->provincia->provincia_nombre }}</td>
                                <td>{{ $local->comuna->provincia->region->region_nombre }}</td>
                                <td>

                                
                                    <!-- editar -->
                                    <a class="btn btn-warning" href="{{ url('/local/editar', $local->id) }}">Editar</a>

                                    <!-- borrar -->
                                    <form action="{{ route('local.destroy', $local->id) }}" class="d-inline" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <input class="btn btn-danger" type="submit" onclick="return confirm('¿Quieres borrar?')" value="Borrar">
                                    </form>
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
