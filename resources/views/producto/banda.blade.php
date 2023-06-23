@extends('layouts.app')

@section('content')

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

<h1>Banda</h1>

<a class="btn btn-success" href="{{ url('/banda/create') }}">Registrar nuevo producto </a>
<br>
<br>
<table class="table table-light">
    <thead class="thead-light">
        <tr>
            <td>Imagen</td>
            <td>Nombre</td>
            <td>ID Representante</td>
            <td>Acciones</td>
        </tr>
    </thead>
    <tbody>
        @foreach($banda as $banda)
        <tr>
            <td>{{ $banda->imagen }}</td>
            <td>{{ $banda->nombre }}</td>
            <td>{{ $banda->representante_id}}</td>
           
            <td>
                <!--editar-->
                <a class="btn btn-warning" href="{{ url('/banda/editar/' . $banda->id) }}">Editar</a>

                <!--borrar-->
                <form action="{{ url('/banda/borrar/' . $banda->id) }}" class="d-inline" method="post">
                    @csrf
                    {{ method_field('DELETE')}}
                    <button class="btn btn-danger" type="submit" onclick="return confirm('¿Estás seguro de que deseas borrar esta banda?')">Borrar</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
</div>
@endsection
