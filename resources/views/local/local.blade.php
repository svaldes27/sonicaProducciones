@extends('layouts.app')

@section('content')

<div class="container">

@if(Session::has('mensaje'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
<strong>{{ Auth::user()->name }}</strong>
{{Session::get('mensaje')}}
<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">

    </button>

</div>
@endif
<h1>Local</h1>

<a class="btn btn-success" href="{{ url('/local/create') }}">Registrar nuevo producto </a>
<br>
<br>
<table class="table table-light">
    <thead class="thead-light">
        <tr>

            <td>Imagen</td>
            <td>Nombre</td>
            <td>Precio</td>
            <td>acciones</td>

        </tr>
    </thead>
    <tbody>
            <td>
                <!--editar-->
                <a class="btn btn-warning"  href="">editar</a>

                <!--borrar-->
                <form action="" class="d-inline" method="post">
                    @csrf
                    {{ method_field('DELETE')}}
                    <input class="btn btn-danger" type="submit" onclick="return confirm(' ¿Quieres borrar?')" value="Borrar">
                </form>
            </td>

    </tbody>
</table>
</div>
@endsection
