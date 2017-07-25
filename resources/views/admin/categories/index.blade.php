@extends('admin.template.main')

@section('title', 'Lista de categorias')

@section('content')

	<a href="{{ route('categories.create') }}" class="btn btn-info">
		Registrar nueva Categoría
	</a>
	<hr>
	<table class="table">
		<thead>
			<th>ID</th>
			<th>Nombre</th>
			<th>Accion</th>
		</thead>
		<tbody>
			@foreach($categories as $category)
				<tr>
					<td>{{ $category->id }}</td>
					<td>{{ $category->name }}</td>
					<td>
						<a href="{{ route('categories.destroy', $category->id) }}" 
						onclick="return confirm('Seguro que deseas eliminarlo?')" class="btn btn-danger">
							<span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
						</a> 
						<a href="{{ route('categories.edit', $category->id)}}" class="btn btn-warning">
							<span class="fa fa-pencil fa-lg" ></span>
						</a>
					</td>
				</tr>
			@endforeach
		</tbody>		
	</table>
	<!--Renderizando la paginacion-->
	{!!  $categories->render() !!}

@endsection