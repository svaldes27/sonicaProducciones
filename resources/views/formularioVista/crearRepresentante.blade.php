@extends('layouts.app')

@section('content')
<div class="container">
    <form action="{{ url('/representante') }}" method="post" enctype="multipart/form-data">

    @csrf
    @include('formularioVista.formRepresentante', ['modo'=>'Crear'])
    </form>
</div>
@endsection
