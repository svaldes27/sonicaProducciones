@extends('layouts.app')

@section('content')
<div class="card" style="border: transparent">
    <div class="card-body">
        <div class="container">
            @if(Auth::check())
                @if(Session::has('mensaje'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert" >
                        <strong>{{ Auth::user()->name }}</strong>
                        {{ Session::get('mensaje') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
            @endif

            <h1>Banda</h1>

            <a class="btn btn-success" href="{{ url('/banda/create') }}">Registrar nueva banda</a>
            <br>
            <br>
            <div class="card">
                <table class="table table-bordered">
                    <thead class="thead-light">
                        <tr>
                            <th>Imagen</th>
                            <th>Nombre</th>
                            <th>Representante</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($bandas as $banda)
                            <tr>
                                <td><img src="{{ asset('storage/' .$banda->imagen) }}" width="100" /></td>
                                <td>{{ $banda->nombre }}</td>
                                <td>{{ $banda->representante->nombre ?? 'Sin representante' }}</td>

                                <td>
                                    <!-- editar -->
                                    <a class="btn btn-warning" href="{{ url('/banda/editar', $banda->id) }}">Editar</a>


                                    <!-- borrar -->
                                    <form action="{{ route('banda.destroy', $banda->id) }}" class="d-inline" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <input class="btn btn-danger" type="submit" onclick="return confirm('¿Estás seguro de que deseas borrar esta banda?')" value="Borrar">
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
