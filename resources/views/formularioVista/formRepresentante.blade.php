<h1>{{ $modo }} Representante</h1>

<div class="form-group">
    <label for="nombre">Ingresar Nombre</label>
    <input type="text" class="form-control" name="nombre" placeholder="Oscar Ayala" value="{{ $representante->nombre ?? old('nombre') }}" id="nombre">

    <label for="email">Ingresar Email</label>
    <input type="email" class="form-control" name="email" placeholder="oscar@ciisa.cl" value="{{ $representante->email ?? old('email') }}" id="email">

    <label for="contacto">Contacto</label>
    <input type="number" class="form-control" name="contacto" placeholder="912345677" value="{{ $representante->contacto ?? old('contacto') }}" id="contacto">
</div>

<input class="btn btn-success" type="submit" value="{{ $modo }} datos">
<a class="btn btn-primary" href="{{ url('/representante/lista') }}">Cancelar</a>


