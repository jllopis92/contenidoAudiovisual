@if (!Auth::guest())
	@if ((Auth::user()->tipo == "profesor") || (Auth::user()->tipo == "administrador")  || (Auth::user()->tipo == "alumno"))
	@extends('layouts.controlPanel')
	@section('content')
		@if (count($movies) === 0)
		<h3 class="orangeAndBoldText" style="margin-bottom: 30px;">Error: No se encuentran videos en el servidor</h3>
		@elseif (count($movies) >= 1)
		<h3 class="orangeAndBoldText" style="margin-bottom: 30px;">Editar Videos</h3>
		<table class="table">
			<thead>
				<th>Nombre</th>
				<th>Idioma</th>
				<th>Categoria</th>
				<th>Formato de Rodaje</th>
				<th>Estado</th>
			</thead>
			@foreach($movies as $movie)
			@if  (Auth::user()->tipo == "alumno")
				@if ($movie->usuario_id == Auth::user()->id)
					<tbody>
						<td>{{$movie->name}}</td>
						<td>{{$movie->language}}</td>
						<td>{{$movie->category}}</td>
						<td>{{$movie->shooting_format}}</td>
						<td>{!! link_to_route('upload.edit', $title = 'Editar', $parameters = $movie->id, $attributes = ['class'=>'btn btn-primary orangeButton'])!!}
						</td>
					</tbody>
				@endif
			@else
				<tbody>
					<td>{{$movie->name}}</td>
					<td>{{$movie->language}}</td>
					<td>{{$movie->category}}</td>
					<td>{{$movie->shooting_format}}</td>
					<td>{!! link_to_route('upload.edit', $title = 'Editar', $parameters = $movie->id, $attributes = ['class'=>'btn btn-primary orangeButton'])!!}
					</td>
				</tbody>
			@endif
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