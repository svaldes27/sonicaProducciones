@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-body">
            <div class="container">

            @if(Auth::check() && Session::has('mensaje'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>{{ Auth::user()->name }}</strong>
                        {{ Session::get('mensaje') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                
                <h1>Equipamiento</h1>

                <a href="{{ route('equipamiento.create') }}" class="btn btn-success mb-3">Agregar Equipamiento</a>
                <br><br>

                @if ($equipamientos->isEmpty())
                    <div class="alert alert-info">
                        No se encontraron equipamientos.
                    </div>
                @else
                    <div class="card">
                        <table class="table table-bordered">
                            <thead class="thead-light">
                                <tr>
                                    <th>Nombre</th>
                                    <th>Descripción</th>
                                    <th>Cantidad</th>
                                    <th>Tipo</th>
                                    <th>Guitarras</th>
                                    <th>Baterías</th>
                                    <th>Otros Instrumentos</th>
                                    <th>Requisitos de Iluminación</th>
                                    <th>Requisitos Especiales</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($equipamientos as $equipamiento)
                                    <tr>
                                        <td>{{ $equipamiento->nombre }}</td>
                                        <td>{{ $equipamiento->descripcion }}</td>
                                        <td>{{ $equipamiento->cantidad }}</td>
                                        <td>{{ $equipamiento->tipo }}</td>
                                        <td>{{ $equipamiento->guitarras }}</td>
                                        <td>{{ $equipamiento->baterias }}</td>
                                        <td>{{ $equipamiento->otros_instrumentos }}</td>
                                        <td>{{ $equipamiento->requisitos_iluminacion }}</td>
                                        <td>{{ $equipamiento->requisitos_especiales }}</td>
                                        <td>
                                            
                                            <a href="{{ url('/equipamiento/editar', $equipamiento->id) }}" class="btn btn-warning">Editar</a>
                                            <form action="{{ route('equipamiento.destroy', $equipamiento->id) }}" method="POST" class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Estás seguro de que deseas eliminar este equipamiento?')">Eliminar</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection
