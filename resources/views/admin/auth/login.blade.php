@extends('admin.template.main')

@section('title', 'Login')

@section('content')
{!! Form::open(['route' => 'admin.auth.login', 'method' => 'POST']) !!}
  <div class="form-group">
    {!! Form::label('email','Email') !!}
    {!! Form::email('email',null,['class' => 'form-control','placeholder' => 'ejemplo@algo.com', 'required']) !!}
  </div>

  <div class="form-group">
    {!! Form::label('password','Contraseña') !!}
    {!! Form::password('password',null,['class' => 'form-control','placeholder' => '******', 'required']) !!}
  </div>

  <div class="form-group">
    {!! Form::submit('Registrar',['class' => 'btn btn-primary']) !!}
  </div>

{!! Form::close() !!}
@endsection
