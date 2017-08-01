@extends('admin.template.main')

@section('title', 'Crear articulos')

@section('content')
{!! Form::open(['route' => 'articles.store', 'method' => 'POST', 'files' => true]) !!}

  <div class="form-group">
    {!!  Form::label('title', 'Titulo') !!}
    {!! Form::text('title', null, ['class' => 'form-control','placeholder' => 'Titulo del articulo', 'required']) !!}
  </div>

  <div class="form-group">
    {!! Form::label('category_id', 'Categoría') !!}
    {!! Form::select('category_id', $categories,null, ['class' => 'form-control', 'placeholder' => 'Seleccione una opcion',
     'required' ]) !!}
  </div>

  <div class="form-group">
    {!! Form::label('content', 'Contenido') !!}
    {!! Form::textarea('content','Descripción del artículo:', ['class' => 'form-control']) !!}
  </div>

  <div class="form-group">
    {!! Form::label('tags', 'Tags') !!}
    {!! Form::select('tags[]', $tags,null, ['class' => 'form-control', 'multiple','required' ]) !!}
  </div>

  <div class="form-group">
    {!! Form::label('image', 'Imagen') !!}
    {!! Form::file('image',null,['class' => 'form-control', 'required']) !!}
  </div>

  <div class="form-group">
    {!! Form::submit('Agregar articulo', ['class' => 'btn btn-primary']) !!}
  </div>

{!! Form::close() !!}
@endsection
