@extends('layouts.app')

@section('content')
<h1>Editar Local</h1>

<form action="{{ route('local.update', $local->id) }}" method="POST"  enctype="multipart/form-data">

    @csrf
    @method('PUT')

    <div class="form-group">
            <label for="nombre">Nombre Local</label>
            <input type="text" class="form-control" name="nombre" value="{{ isset($local->nombre) ? $local->nombre : old('nombre') }}" id="nombre">
        </div>

        <div class="form-group">
            <label for="direccion">Dirección</label>
            <input type="text" class="form-control" name="direccion" value="{{ isset($local->direccion) ? $local->direccion : old('direccion') }}" id="direccion">
        </div>

        <div class="form-group">
            <label for="region">Región</label>
            <select class="form-control" name="region" id="region">
                @foreach($regiones as $region_id => $region_nombre)
                    <option value="{{ $region_id }}" {{ $local->comuna->provincia->region->region_id == $region_id ? 'selected' : '' }}>
                        {{ $region_nombre }}
                    </option>
                @endforeach
            </select>
        </div>


        <div class="form-group">
            <label for="provincia">Provincia</label>
            <select class="form-control" name="provincia" id="provincia">
                @foreach($provincias as $provincia_id => $provincia_nombre)
                    <option value="{{ $provincia_id }}" {{ $local->comuna->provincia->provincia_id == $provincia_id ? 'selected' : '' }}>
                        {{ $provincia_nombre }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="comuna">Comuna</label>
            <select class="form-control" name="comuna" id="comuna">
                @foreach($comunas as $comuna_id => $comuna_nombre)
                    <option value="{{ $comuna_id }}" {{ $local->comuna->comuna_id == $comuna_id ? 'selected' : '' }}>
                        {{ $comuna_nombre }}
                    </option>
                @endforeach
            </select>
        </div>


        <input class="btn btn-success" type="submit"  value="Guardar">
        <a class="btn btn-primary" href="{{ url('/local/lista') }}">Cancelar</a>



</form>
@endsection