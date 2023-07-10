@extends('layouts.app')

@section('content')
<div class="container">
    <form action="{{ url('/equipamiento') }}" method="post" enctype="multipart/form-data">
        @csrf
        @include('formularioVista.formEquipamiento', ['modo'=>'Crear'])
    </form>
</div>
@endsection