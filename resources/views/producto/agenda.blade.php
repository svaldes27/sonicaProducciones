@extends('layouts.app')
@section('content')
<div class="card" style="border: transparent" >
  <div class="card-body">
      <div class="container">
          @if(Auth::check())
              @if(Session::has('mensaje'))
                  <div class="alert alert-success alert-dismissible fade show" role="alert" >
                      <strong>{{ Auth::user()->name }}</strong>
                      {{ Session::get('mensaje') }}
                      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                  </div>
              @endif
          @endif
          <h1>Agenda</h1>


            <div class="jumbotron">
              <a href="{{ url('/agenda/create') }}" class="btn btn-success">Registrar nuevo evento</a>
            </div>
            <br>


          <div class="container">
              <div id="agenda">
              </div>
          </div>

          <!-- Modal -->
          <div class="modal fade" id="evento" tabindex="-1" aria-labelledby="eventoLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h1 class="modal-title fs-5" id="evento">Modal title</h1>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <!-- BODY MODAL-->
                <div class="modal-body">
                  <form action="{{ route('agenda.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group" >
                      <label for="banda">Seleccione una banda</label>
                      <select class="form-control" name="banda" id="banda">
                      @foreach($banda as $id => $nombre)
                        <option value="{{ $id }}">{{ $nombre }}</option>
                      @endforeach
                      </select>

                      <label for="local">Seleccione un local</label>
                      <select class="form-control" name="local" id="local">
                      @foreach($local as $id => $nombre)
                        <option value="{{ $id }}">{{ $nombre }}</option>
                      @endforeach
                      </select>
                      <br>
                      <button type="submit" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                      <button type="button" class="btn btn-primary" id="btnSave">Agregar</button>
                    </div>  
                  </form>        
                </div>
                <div class="modal-footer">
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
@endsection