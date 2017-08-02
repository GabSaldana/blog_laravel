@extends('admin/template/main')

@section('title','Inicio')

@section('content')
    <h1>WELCOME! Ya estas registrado?</h1>
    <a href="{{ route('admin.auth.login') }}" class="btn btn-success"> LOGIN</a>
    <h1>WELCOME! No estas registrado?</h1>
    <a href="{{ route('admin.auth.login') }}" class="btn btn-success"> SING UP</a>
@endsection
