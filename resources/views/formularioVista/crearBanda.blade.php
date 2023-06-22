@extends('layouts.app')

@section('content')
<div class="container">
    <form action="{{ url('/banda') }}" method="post" enctype="multipart/form-data">
    @csrf
    @include('formularioVista.formBanda', ['modo'=>'Crear'])
    </form>
</div>
@endsection
