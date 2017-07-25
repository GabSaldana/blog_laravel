
@extends('admin.template.main')

@section('title', 'Editar Categoría ' . $category->name)

@section('content')

	{!! Form::open(['route'=>['categories.update',$category->id],'method' => 'PUT']) !!} 
		<div class="form-group">		
			{!! Form::label('name','Nombre') !!}
			{!! Form::text('name',$category->name,['class' => 'form-control','placeholder' => 'Nombre Completo', 'required']) !!}
		</div>

		<div class="form-group">
			{!! Form::submit('Cambiar',['class' => 'btn btn-primary']) !!}
		</div>

	{!! Form::close() !!}

@endsection
