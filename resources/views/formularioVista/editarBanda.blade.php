@extends('layouts.app')
@section('content')
<h1>Editar Banda</h1>

<form action="{{ route('banda.update', $banda->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <div class="form-group">
        <label for="nombre">Nombre de la Banda</label>
        <input type="text" class="form-control" name="nombre" value="{{ $banda->nombre }}" required>
    </div>

    <div class="form-group">
        <label for="representante">Representante</label>
        <select class="form-control" name="representante" required>
            @foreach($representantes as $id => $nombre)
                <option value="{{ $id }}" {{ $banda->representante_id == $id ? 'selected' : '' }}>{{ $nombre }}</option>
            @endforeach
        </select>
    </div>

    <div class="form-group">
        <label for="imagen">Imagen</label>
        <input type="file" class="form-control" name="imagen">
    </div>

    <button type="submit" class="btn btn-primary">Guardar Cambios</button>
</form>
@endsection