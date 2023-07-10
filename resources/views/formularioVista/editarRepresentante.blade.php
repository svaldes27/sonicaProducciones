@extends('layouts.app')

@section('content')
<h1>Editar Representante</h1>

<form action="{{ route('representante.update', $representante->id) }}" method="POST"  enctype="multipart/form-data">

    @csrf
    @method('PUT')

    <div class="form-group">
        <label for="nombre">Nombre del Representante</label>
        <input type="text" class="form-control" name="nombre" value="{{ $representante->nombre }}" required>
    </div>

    <div class="form-group">
        <label for="email">Email</label>
        <input type="email" class="form-control" name="email" value="{{ $representante->email }}" required>
    </div>

    <div class="form-group">
        <label for="contacto">Contacto</label>
        <input type="text" class="form-control" name="contacto" value="{{ $representante->contacto }}" required>
    </div>

    <button type="submit" class="btn btn-success">Guardar Cambios</button>
    <a class="btn btn-primary" href="{{ url('/representante/lista') }}">Cancelar</a>
</form>
@endsection
