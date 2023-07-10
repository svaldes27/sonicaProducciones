@extends('layouts.app')

@section('content')
<div class="container">
    <form action="{{ url('/evento') }}" method="post" enctype="multipart/form-data">
        @csrf
        @include('formularioVista.formEvento', ['modo'=>'Crear'])
    </form>
</div>
@endsection