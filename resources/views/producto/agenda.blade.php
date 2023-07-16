@extends('layouts.app')
@section('content')

<div class="container">
    <div id="agenda">
        
    </div>
</div>
    
  <!-- Modal -->
  <div class="modal fade" id="evento" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="modal-agenda">Agendar Evento</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">

          <form action="" id="formularioEvento">

            {!! csrf_field() !!}

            <div class="form-group" >
              <label for="" >ID</label>
              <input type="text" class="form-control" name="id" id="id" aria-describedby="helpId" aria-placeholder="Nombre del representante">
            </div>

            <div class="form-group">
              <label for="">Banda</label>
              <input type="text" class="form-control" name="banda" id="banda_id" aria-describedby="helpId" placeholder="Nombre del cantante o banda">
            </div>

            <div class="form-group">
              <label for="">Local</label>
              <select class="form-control" name="local" id="local_id" aria-placeholder="Local del evento">
                <option> </option>
                <option>Nacional</option>
                <option>Ester Roa</option>
                <option>Tierra de Campeones</option>
              </select>
            </div>
            
            <div class="form-group">
              <label for="">Representante</label>
              <input type="text" class="form-control" name="representante" id="representante_id" aria-describedby="helpId" aria-placeholder="Nombre del representante">
            </div>

            <div class="form-group">
              <legend>Equipamiento</legend>
              <div class="form-check">
                
                <label class="form-check-label">
                  <input type="checkbox" class="form-check-input" name="instrument" id="1" value="checkedValue" >
                  Instrumentos
                </label>
              </div>
              <div class="form-check">
                <label class="form-check-label">
                  <input type="checkbox" class="form-check-input" name="lightning" id="2" value="checkedValue" >
                  Iluminación
                </label>
              </div>

              <div class="form-check">
                <label class="form-check-label">
                  <input type="checkbox" class="form-check-input" name="amplification" id="3" value="checkedValue" >
                  Aplificación
                </label>
              </div>
            </div>

            <div class="form-group">
              <label for="start">Comienzo</label>
              <input type="date" class="form-control" name="start" id="start" aria-describedby="helpId" aria-placeholder=" ">
              <small id="helpId" class="form-text text-muted"></small>
            </div>

          </form>

        </div>

        <div class="modal-footer">

          <button type="button" class="btn btn-primary" id="btnGuardar">Guardar</button>
          <button type="button" class="btn btn-warning" id="btnModificar">Modificar</button>
          <button type="button" class="btn btn-danger" id="btnEliminar">Eliminar</button>
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>

        </div>
      </div>
    </div>
  </div>

@endsection