
<h1>{{ $modo }} Local</h1>

@if(count($errors)>0)

        <div class=" alert alert-danger" role="alert">
        <ul>
                @foreach( $errors->all() as $error)
                        <li>{{ $error }}</li>
                @endforeach
        </ul>
        </div>
@endif


<div class="form-group">
        <label for="nombre">Nombre Local</label>
        <input type="nombre" class="form-control" name="nombre" value="{{   isset($local->nombre)? $local->nombre:old('nombre') }}" id="nombre">

</div>

<div class="form-group">
        <label for="direccion">Direccion</label>
        <input type="nombre" class="form-control" name="direccion" value="{{   isset($local->direccion)? $local->direccion:old('direccion') }}" id="direccion">

         <div class="form-group">
    <label for="Comuna">Comuna</label>
    <select class="form-control" name="representante" id="representante">
      <option value="representante1">Comuna 1</option>
      <option value="representante2">Comuna 2</option>
      <option value="representante3">Comuna 3</option>
      <!-- Agrega más opciones de representantes según sea necesario -->
    </select>
  </div>



<input class="btn btn-success" type="submit" value="Guardar">

<a class="btn btn-primary" href="{{ url('/producto/lista') }}">Cancelar</a>
