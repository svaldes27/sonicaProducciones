@extends('layouts.app')
@section('content')

<div class="card">
    <div class="card-body">
        <div class="container">
                <h1>{{ $modo }} Local</h1>
                <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
                <script>
                    $(document).ready(function() {
                        // Al cambiar la región seleccionada, cargar las provincias correspondientes
                        $('#region').change(function() {
                            var regionId = $(this).val();
                            $.ajax({
                                url: '{{ route('getProvincias') }}',
                                type: 'GET',
                                data: {
                                    region_id: regionId
                                },
                                success: function(response) {
                                    $('#provincia').html(response);
                                }
                            });
                        });

                        // Al cambiar la provincia seleccionada, cargar las comunas correspondientes
                        $('#provincia').change(function() {
                            var provinciaId = $(this).val();
                            $.ajax({
                                url: '{{ route('getComunas') }}',
                                type: 'GET',
                                data: {
                                    provincia_id: provinciaId
                                },
                                success: function(response) {
                                    $('#comuna').html(response);
                                }
                            });
                        });
                    });
                </script>

                @if(count($errors)>0)
                    <div class="alert alert-danger" role="alert">
                        <ul>
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('local.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    
                        <div class="form-group">
                            <label for="nombre">Nombre Local</label>
                            <input type="text" class="form-control" name="nombre" value="{{ isset($local->nombre) ? $local->nombre : old('nombre') }}" id="nombre" required>
                        </div>

                        <div class="form-group">
                            <label for="direccion">Dirección</label>
                            <input type="text" class="form-control" name="direccion" value="{{ isset($local->direccion) ? $local->direccion : old('direccion') }}" id="direccion" required>
                        </div>

                        <div class="form-group">
                            <label for="region">Región</label>
                            <select class="form-control" name="region" id="region" required>
                                @foreach($regiones as $region_id => $region_nombre)
                                    <option value="{{ $region_id }}">{{ $region_nombre }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="provincia">Provincia</label>
                            <select class="form-control" name="provincia" id="provincia" required>
                                <!-- Las opciones de provincia se cargarán dinámicamente mediante JavaScript -->
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="comuna">Comuna</label>
                            <select class="form-control" name="comuna" id="comuna" required>
                                <!-- Las opciones de comuna se cargarán dinámicamente mediante JavaScript -->
                            </select>
                        </div>

                        <input class="btn btn-success" type="submit"  value="Guardar">
                        <a class="btn btn-primary" href="{{ url('/local/lista') }}">Cancelar</a>

                </form>
        </div>        
    </div>
</div>
@endsection