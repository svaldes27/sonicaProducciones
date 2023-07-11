@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-body">
        <div class="container">
                <h1>{{ $modo }} Evento</h1>

                <form action="{{ route('agenda.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="nombre">Seleecione un local</label>
                        <select class="form-control" name="local" required>
                            @foreach($local as $id => $nombre)
                                <option value="{{ $id }}">{{ $nombre }}</option>
                            @endforeach
                        </select>

                        <label for="nombre">Seleecione una banda</label>
                        <select class="form-control" name="banda" required>
                            @foreach($banda as $id => $nombre)
                                <option value="{{ $id }}">{{ $nombre }}</option>
                            @endforeach
                        </select>
                        <label for="nombre"></label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="ni ni-calendar-grid-58"></i></span>
                            </div>
                            <input class="form-control datepicker" name="fecha" placeholder="Seleccione una fecha"
                            type="date" value="{{ date('d-m-Y')}}" data-date-format="dd-mm-yyyy"
                            data-date-start-date="{{date('Y-m-d')}}" data-date-end-date="+30d">
                        </div>
                    </div>
                    <br>
                    <input class="btn btn-success" type="submit" value="{{ $modo }} datos">
                    <a class="btn btn-primary" href="{{ url('/agenda/lista') }}">Cancelar</a>
                </form>
        </div>        
    </div>
</div>  
@endsection