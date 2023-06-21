
<h1>{{ $modo }} Banda</h1>
<div class="form-group">
        <label for="nombre">Ingresar Nombre</label>
        <input type="nombre" class="form-control" name="nombre"  id="nombre" placeholder="ejemplo the beatles">
        
</div>
<div class="form-group">
        <label for="imagen"></label>
        @if(isset($banda->imagen))
        
        <img class="img-thumbnail img-fluid" src="{{ asset('storage').'/'.$banda->imagen }}" width="100" alt="">
        @endif
        
        <input type="file" class="form-control" name="imagen" value='' id="imagen">
        
</div>
        
        <input class="btn btn-success" type="submit" value="{{ $modo }} datos ">

        <a class="btn btn-primary" href="{{ url('/producto/lista') }}">Cancelar</a>