@extends('layouts.app')

@section('content')
<div class="container">
    <form action="{{ url('/local') }}" method="post" enctype="multipart/form-data">
    @csrf
    @include('formularioVista.formLocal', ['modo'=>'Crear'])
    </form>
</div>
@endsection
