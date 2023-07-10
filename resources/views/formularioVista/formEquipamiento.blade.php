@extends('layouts.app')

@section('content')

<div class="card">
    <div class="card-body">
        <div class="container">

            <h1>{{ $modo }} Equipamiento</h1>

            <form action="{{ route('equipamiento.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="form-group">
                    <label for="nombre">Nombre del equipamiento</label>
                    <input type="text" id="nombre" name="nombre" class="form-control" placeholder="trompeta" required>
                </div>
                <br>
                <div class="form-group">
                    <label for="descripcion">Descripción</label>
                    <textarea id="descripcion" name="descripcion" class="form-control" rows="3" placeholder="describa lo necesario"></textarea>
                </div>
                <br>
                <div class="form-group">
                    <label for="cantidad">Cantidad</label>
                    <input type="number" id="cantidad" name="cantidad" class="form-control" placeholder="1 o más" required>
                </div>
                <br>
                <div class="form-group">
                    <label for="tipo">Tipo de equipamiento:</label>
                    <select id="tipo" name="tipo" class="form-control" required>
                        <option value="">Seleccione el tipo de equipamiento</option>
                        <option value="Instrumento musical">Instrumento musical</option>
                        <option value="Equipo de sonido">Equipo de sonido</option>
                        <option value="Iluminación">Iluminación</option>
                        <!-- Agrega más opciones según tus necesidades -->
                    </select>
                </div>
                <br>
                <!-- Campos adicionales específicos de la banda -->
                <div class="form-group">
                    <label for="guitarras">Guitarras necesarias</label>
                    <input type="number" id="guitarras" name="guitarras" class="form-control" placeholder="1 o más">
                </div>
                <br>
                <div class="form-group">
                    <label for="baterias">Baterías necesarias:</label>
                    <input type="number" id="baterias" name="baterias" class="form-control" placeholder="1 o más">
                </div>
                <br>
                <div class="form-group">
                    <label for="otros_instrumentos">Otros instrumentos necesarios</label>
                    <textarea id="otros_instrumentos" name="otros_instrumentos" class="form-control" rows="3" placeholder="Describa"></textarea>
                </div>
                <br>
                <div class="form-group">
                    <label for="requisitos_iluminacion">Requisitos de iluminación</label>
                    <textarea id="requisitos_iluminacion" name="requisitos_iluminacion" class="form-control" rows="3" placeholder="Describa lo necesario"></textarea>
                </div>
                <br>
                <div class="form-group">
                    <label for="requisitos_especiales">Requisitos especiales</label>
                    <textarea id="requisitos_especiales" name="requisitos_especiales" class="form-control" rows="3" placeholder="Describa"></textarea>
                </div>
                <br>
                <div class="form-group">
                    <input class="btn btn-success" type="submit" value="{{ $modo }} datos">
                    <a class="btn btn-primary" href="{{ url('/equipamiento/lista') }}">Cancelar</a>
                </div>
            </form>

        </div>        
    </div>
</div>
@endsection
