@extends('layouts.app')
@section('content')

<div class="container" style="text-align: end">
  <div class="jumbotron">
    <a href="{{ url('/agenda/create') }}" class="btn btn-success">Agregar</a>
  </div>
  <br>
</div>

<div class="container">
    <div id="agenda">
        calendario
    </div>
</div>

    Button trigger modal 
    <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#evento">
      Launch
    </button>
    -->
  <!-- Modal 
  <div class="modal fade" id="evento" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Booking title</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <input type="text" class="form-control" id="title">
          <span id="titleError" class="text-danger"></span>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="button" id="saveBtn" class="btn btn-primary">Save changes</button>
        </div>
      </div>
    </div>
  </div>
-->
@endsection