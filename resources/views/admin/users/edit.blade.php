
@extends('admin.template.main')

@section('title', 'Editar Usuario ' . $user->name)

@section('content')

	{!! Form::open(['route'=>['users.update',$user->id],'method' => 'PUT']) !!} 
		<div class="form-group">		
			{!! Form::label('name','Nombre') !!}
			{!! Form::text('name',$user->name,['class' => 'form-control','placeholder' => 'Nombre Completo', 'required']) !!}
		</div>

		<div class="form-group">		
			{!! Form::label('email','Email') !!}
			{!! Form::email('email',$user->email,['class' => 'form-control','placeholder' => 'ejemplo@algo.com', 'required']) !!}
		</div>

		<div class="form-group">
			{!! Form::label('type','Tipo') !!}
			{!! Form::select('type', ['' => 'Seleccione un nivel', 'paciente' => 'Paciente', 'doctor' => 'Doctor'],null ,['class' => 'form-control']) !!}
		</div>

		<div class="form-group">
			{!! Form::submit('Cambiar',['class' => 'btn btn-primary']) !!}
		</div>

	{!! Form::close() !!}

@endsection
