@extends('admin.template.main')

@section('title', 'Lista de tags')

@section('content')

	<a href="{{ route('tags.create') }}" class="btn btn-info">Registrar nuevo tag</a><hr>

	<!-- BUSCADOR-->
{!! Form::open(['route' => 'tags.index', 'method' => 'GET', 'class' => 'navbar-form pull-right']) !!}
<div class="form-group">
	<div class="input-group">
		<span class="input-group-addon" id="search" ><span class="fa fa-search" aria-hidden="true"> </span></span>
		{!! Form::text('name',null,['class' => 'form-control','placeholder' => 'Buscar tag...', 'aria-describedby' => 'search']) !!}
	</div>
</div>

{!! Form::close() !!}

	<!--FIN BUSCADOR-->
	<table class="table">
		<thead>
			<th>ID</th>
			<th>Nombre</th>
		</thead>
		<tbody>
			@foreach($tags as $tag)
				<tr>
					<td>{{ $tag->id }}</td>
					<td>{{ $tag->name }}</td>
					<td>
						<a href="{{ route('tags.destroy', $tag->id) }}"
						onclick="return confirm('Seguro que deseas eliminarlo?')" class="btn btn-danger">
							<span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
						</a>
						<a href="{{ route('tags.edit', $tag->id)}}" class="btn btn-warning">
							<span class="fa fa-pencil fa-lg" ></span>
						</a>
					</td>
				</tr>
			@endforeach
		</tbody>
	</table>
	<div class="text-center">
		<!--Renderizando la paginacion, sin esto no aparece en la vista-->
		{!!  $tags->render() !!}
	</div>

@endsection
