<h1>{{ $modo }} Banda</h1>
  <div class="form-group">
    <label for="nombre">Ingresar Nombre</label>
    <input type="text" class="form-control" name="nombre" id="nombre" placeholder="Ejemplo The Beatles">
  </div>

 <div class="form-group">
  <label for="representante">Seleccionar Representante</label>
  <select class="form-control" name="representante" id="representante">
    @foreach($representantes as $id => $nombre)
      <option value="{{ $id }}">{{ $nombre }}</option>
    @endforeach
  </select>
</div>

  <div class="form-group">
    <label for="imagen"></label>
    @if(isset($banda->imagen))
      <img class="img-thumbnail img-fluid" src="{{ asset('storage').'/'.$banda->imagen }}" width="100" alt="">
    @endif
    <input type="file" class="form-control" name="imagen" value='' id="imagen">
  </div>

  <input class="btn btn-success" type="submit" value="{{ $modo }} datos">
  <a class="btn btn-primary" href="{{ url('/producto/lista') }}">Cancelar</a>
</form>
