@foreach($comunas as $comuna_id => $comuna_nombre)
    <option value="{{ $comuna_id }}">{{ $comuna_nombre }}</option>
@endforeach
