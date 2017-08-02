@extends('admin.template.main')

@section('title', 'Lista de artículos')

@section('content')

<a href="{{ route('articles.create') }}" class="btn btn-info">Registrar nuevo artículo</a><hr>

<!-- BUSCADOR-->
{!! Form::open(['route' => 'articles.index', 'method' => 'GET', 'class' => 'navbar-form pull-right']) !!}
<div class="form-group">
  <div class="input-group">
    <span class="input-group-addon" id="search" ><span class="fa fa-search" aria-hidden="true"> </span></span>
      {!! Form::text('title',null,['class' => 'form-control','placeholder' => 'Buscar artículo...', 'aria-describedby' => 'search']) !!}
    </div>
</div>
{!! Form::close() !!}

  <table class="table table-striped">
      <thead>
          <th>ID</th>
          <th>Título</th>
          <th>Categría</th>
          <th>Usuario</th>
          <th>Acción</th>
      </thead>
      <tbody>
          @foreach ($articles as $article)
              <tr>
                <td> {{ $article->id }}</td>
                <td> {{ $article->title }}</td>
                <td> {{ $article->category->name }}</td>
                <td> {{ $article->user->name }}</td>
                <td> {{ $article->id }}</td>
                <td>
      						<a href="{{ route('articles.destroy', $article->id) }}"
      						onclick="return confirm('Seguro que deseas eliminarlo?')" class="btn btn-danger">
      							<span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
      						</a>
      						<a href="{{ route('articles.edit', $article->id)}}" class="btn btn-warning">
      							<span class="fa fa-pencil fa-lg" ></span>
      						</a>
      					</td>
              </tr>
          @endforeach
      </tbody>
  </table>

  <div class="text-center">
		<!--Renderizando la paginacion, sin esto no aparece en la vista-->
		{!!  $articles->render() !!}
	</div>
@endsection
