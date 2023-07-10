@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-body">
        <div class="container">
                <h1>{{ $modo }} Banda</h1>

                <form action="{{ route('banda.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="nombre">Nombre de la Banda</label>
                        <input type="text" class="form-control" name="nombre" value="{{ $banda->nombre ?? old('nombre') }}" required>

                        <label for="representante">Representante</label>
                        <select class="form-control" name="representante" required>
                            @foreach($representantes as $id => $nombre)
                                <option value="{{ $id }}" {{ ($banda->representante_id ?? old('representante')) == $id ? 'selected' : '' }}>{{ $nombre }}</option>
                            @endforeach
                        </select>

                        <label for="imagen">Imagen</label>
                        <input type="file" class="form-control" name="imagen" required>
                    </div>

                    <input class="btn btn-success" type="submit" value="{{ $modo }} datos">
                    <a class="btn btn-primary" href="{{ url('/banda/lista') }}">Cancelar</a>
                </form>
        </div>        
    </div>
</div>  
@endsection



