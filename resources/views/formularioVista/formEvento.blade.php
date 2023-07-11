@extends('layouts.app')

@section('content')
<div class="card" ">
    <div class="card-body">
        <div class="container">
            <h1>{{ $modo }} Evento</h1>
            <form action="{{ route('agenda.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">

                    <label for="local">Seleecione un local</label>
                    <select class="form-control" name="local" required>
                        @foreach($local as $id => $nombre)
                            <option value="{{ $id }}">{{ $nombre }}</option>
                        @endforeach
                    </select>
                    <br>

                    <label for="banda">Seleecione una banda</label>
                    <select class="form-control" name="banda" required>
                        @foreach($banda as $id => $nombre)
                            <option value="{{ $id }}">{{ $nombre }}</option>
                        @endforeach
                    </select>
                    <br>

                    <label for="equipamiento">Seleecione un equipamiento</label>
                    <select class="form-control" name="equipamiento" required>
                        @foreach($equipamiento as $id => $nombre)
                            <option value="{{ $id }}">{{ $nombre }}</option>
                        @endforeach
                    </select>
                    <br>

                    <label for="fecha">Seleecione una fecha</label>
                    <input class="form-control datepicker" 
                    name="fecha" id="fecha" placeholder="Seleccione una fecha"
                    type="date" value="{{ date('d-m-Y')}}" data-date-format="dd-mm-yyyy"
                    data-date-start-date="{{date('Y-m-d')}}" data-date-end-date="+30d"
                    style="width: 15%">
                    <br>

                    <label for="hora">Seleecione una Hora</label><br>
                    <input type="time" style="width: 15%" name="hora" id="hora" />
                    <br>

                </div>
                <br>
                <input class="btn btn-success" type="submit" value="{{ $modo }} datos">
                <a class="btn btn-primary" href="{{ url('/agenda/lista') }}">Cancelar</a>
            </form>
        </div>        
    </div>
</div>  
@endsection