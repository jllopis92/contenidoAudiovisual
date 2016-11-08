@if (!Auth::guest())
	@if ((Auth::user()->tipo == "profesor") || (Auth::user()->tipo == "administrador"))
	@extends('layouts.panelprofesor')
	@section('content')
		@if (count($movies) === 0)
		<h3 style="margin-bottom: 30px;">Error: No se encuentran videos en el servidor</h3>
		@elseif (count($movies) >= 1)
		<h3 style="margin-bottom: 30px;">Editar Videos</h3>
		<table class="table">
			<thead>
				<th>Nombre</th>
				<th>Idioma</th>
				<th>Categoria</th>
				<th>Formato de Rodaje</th>
				<th>Estado</th>
			</thead>
			@foreach($movies as $movie)
			<tbody>
				<td>{{$movie->name}}</td>
				<td>{{$movie->language}}</td>
				<td>{{$movie->category}}</td>
				<td>{{$movie->shooting_format}}</td>
				<td>{!! link_to_route('upload.edit', $title = 'Editar', $parameters = $movie->id, $attributes = ['class'=>'btn btn-primary'])!!}
				</td>
			</tbody>
			@endforeach
		</table>
		{!!$movies->render()!!}
		@endif
		@endsection
	@else
		<script type="text/javascript">
			window.location = "/";//here double curly bracket
		</script>
	@endif
@else
	<script type="text/javascript">
		window.location = "/";//here double curly bracket
	</script>
@endif