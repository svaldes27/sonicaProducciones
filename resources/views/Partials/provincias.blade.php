@foreach($provincias as $provincia_id => $provincia_nombre)
    <option value="{{ $provincia_id }}">{{ $provincia_nombre }}</option>
@endforeach

