
@extends('admin.template.main')

@section('title', 'Editar Tag ' . $tag->name)

@section('content')

	{!! Form::open(['route'=>['tags.update',$tag->id],'method' => 'PUT']) !!}
		<div class="form-group">
			{!! Form::label('name','Nombre') !!}
			{!! Form::text('name',$tag->name,['class' => 'form-control','placeholder' => 'Nombre del Tag', 'required']) !!}
		</div>

		<div class="form-group">
			{!! Form::submit('Cambiar',['class' => 'btn btn-primary']) !!}
		</div>

	{!! Form::close() !!}

@endsection
