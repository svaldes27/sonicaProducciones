@extends('layouts.app')

@section('content')
    <div class="container">
    <form action="{{ url('/representante/'.$representante->id )}}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        @include('formularioVista.formRepresentante', ['modo'=>'Editar'])
    </form>
</div>
@endsection

