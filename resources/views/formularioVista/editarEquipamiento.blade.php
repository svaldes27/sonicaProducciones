@extends('layouts.app')

@section('content')

<div class="card">
    <div class="card-body">
        <div class="container">

            <h1>Editar Equipamiento</h1>

            <form action="{{ route('equipamiento.update', $equipamiento->id ) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="nombre">Nombre del equipamiento</label>
                    <input type="text" id="nombre" name="nombre" class="form-control" placeholder="trompeta" value="{{ $equipamiento->nombre }}" required>
                </div>
                <br>
                <div class="form-group">
                    <label for="descripcion">Descripción</label>
                    <textarea id="descripcion" name="descripcion" class="form-control" rows="3" placeholder="describa lo necesario">{{ $equipamiento->descripcion }}</textarea>
                </div>
                <br>
                <div class="form-group">
                    <label for="cantidad">Cantidad</label>
                    <input type="number" id="cantidad" name="cantidad" class="form-control" placeholder="1 o más" value="{{ $equipamiento->cantidad }}" required>
                </div>
                <br>
                <div class="form-group">
                    <label for="tipo">Tipo de equipamiento:</label>
                    <select id="tipo" name="tipo" class="form-control" required>
                        <option value="">Seleccione el tipo de equipamiento</option>
                        <option value="Instrumento musical" {{ $equipamiento->tipo == 'Instrumento musical' ? 'selected' : '' }}>Instrumento musical</option>
                        <option value="Equipo de sonido" {{ $equipamiento->tipo == 'Equipo de sonido' ? 'selected' : '' }}>Equipo de sonido</option>
                        <option value="Iluminación" {{ $equipamiento->tipo == 'Iluminación' ? 'selected' : '' }}>Iluminación</option>
                        <!-- Agrega más opciones según tus necesidades -->
                    </select>
                </div>
                <br>
                <!-- Campos adicionales específicos de la banda -->
                <div class="form-group">
                    <label for="guitarras">Guitarras necesarias</label>
                    <input type="number" id="guitarras" name="guitarras" class="form-control" placeholder="1 o más" value="{{ $equipamiento->guitarras }}">
                </div>
                <br>
                <div class="form-group">
                    <label for="baterias">Baterías necesarias:</label>
                    <input type="number" id="baterias" name="baterias" class="form-control" placeholder="1 o más" value="{{ $equipamiento->baterias }}">
                </div>
                <br>
                <div class="form-group">
                    <label for="otros_instrumentos">Otros instrumentos necesarios</label>
                    <textarea id="otros_instrumentos" name="otros_instrumentos" class="form-control" rows="3" placeholder="Describa">{{ $equipamiento->otros_instrumentos }}</textarea>
                </div>
                <br>
                <div class="form-group">
                    <label for="requisitos_iluminacion">Requisitos de iluminación</label>
                    <textarea id="requisitos_iluminacion" name="requisitos_iluminacion" class="form-control" rows="3" placeholder="Describa lo necesario">{{ $equipamiento->requisitos_iluminacion }}</textarea>
                </div>
                <br>
                <div class="form-group">
                    <label for="requisitos_especiales">Requisitos especiales</label>
                    <textarea id="requisitos_especiales" name="requisitos_especiales" class="form-control" rows="3" placeholder="Ej: tipo de comida">{{ $equipamiento->requisitos_especiales }}</textarea>
                </div>
                <br>
                <div class="form-group">
                    <button type="submit" class="btn btn-success">Guardar Cambios</button>
                    <a class="btn btn-primary" href="{{ url('/equipamiento/lista') }}">Cancelar</a>
                </div>
            </form>

        </div>        
    </div>
</div>
@endsection
