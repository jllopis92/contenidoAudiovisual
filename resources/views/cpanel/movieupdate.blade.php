@if (!Auth::guest())
	@if ((Auth::user()->tipo == "profesor") || (Auth::user()->tipo == "administrador")  || (Auth::user()->tipo == "alumno"))
	@extends('layouts.controlPanel')
	@section('content')
		@if (count($movies) === 0)
		<h3 class="orangeAndBoldText" style="margin-bottom: 30px; padding-left: 15px;">Error: No se encuentran videos en el servidor</h3>
		@elseif (count($movies) >= 1)
		@if (Auth::user()->tipo == "alumno")
			@foreach($movies as $movie)
				@if ($movie->usuario_id == Auth::user()->id)
					{{$movie->name}}
				@endif
			@endforeach
		@endif

		<h3 class="orangeAndBoldText" style="margin-bottom: 30px;">Editar Videos</h3>
		<table class="table" data-filtering="true" data-paging="true" data-sorting="true">
			<thead>
				<th>Nombre</th>
				<th>Asignatura</th>
				<th>Tipo</th>
				<th>Genero</th>
				<th>Formato de Rodaje</th>
				<th data-type="html"> </th>
			</thead>
			<tbody>
				@if (Auth::user()->tipo == "alumno")
					@foreach($movies as $movie)
						@if ($movie->usuario_id == Auth::user()->id)
							<tr>
								<td>{{$movie->name}}</td>
								@foreach($subjects as $subject)
									@if($subject->id == $movie->asignatura_id)
										<td>{{$subject->name}}</td>
									@endif
								@endforeach
								@foreach($types as $type)
									@if($type->id == $movie->type_id)
										<td>{{$type->name}}</td>
									@endif
								@endforeach
								@foreach($genres as $genre)
									@if($genre->id == $movie->genre_id)
										<td>{{$genre->name}}</td>
									@endif
								@endforeach
								@foreach($formats as $format)
									@if($format->id == $movie->format_id)
										<td>{{$format->name}}</td>
									@endif
								@endforeach
								<td>{!! link_to_route('upload.edit', $title = 'Editar', $parameters = $movie->id, $attributes = ['class'=>'btn btn-primary orangeButton'])!!}
								</td>
							</tr>
						@endif
					@endforeach
				@elseif (Auth::user()->tipo == "profesor")
					
					@foreach($movies as $movie)
						@foreach($subjects as $subject)
							@if (($subject->profesor_id == Auth::user()->id) && ($subject->id == $movie->asignatura_id))
								<tr>
									<td>{{$movie->name}}</td>
									<td>{{$subject->name}}</td>
									@foreach($types as $type)
										@if($type->id == $movie->type_id)
											<td>{{$type->name}}</td>
										@endif
									@endforeach
									@foreach($genres as $genre)
										@if($genre->id == $movie->genre_id)
											<td>{{$genre->name}}</td>
										@endif
									@endforeach
									@foreach($formats as $format)
										@if($format->id == $movie->format_id)
											<td>{{$format->name}}</td>
										@endif
									@endforeach
									<td>{!! link_to_route('upload.edit', $title = 'Editar', $parameters = $movie->id, $attributes = ['class'=>'btn btn-primary orangeButton'])!!}
									</td>
								</tr>
							@endif
						@endforeach
					@endforeach
					
				@else
					@foreach($movies as $movie)
						<tr>
							<td>{{$movie->name}}</td>
								@foreach($subjects as $subject)
									@if($subject->id == $movie->asignatura_id)
										<td>{{$subject->name}}</td>
									@endif
								@endforeach
								@foreach($types as $type)
									@if($type->id == $movie->type_id)
										<td>{{$type->name}}</td>
									@endif
								@endforeach
								@foreach($genres as $genre)
									@if($genre->id == $movie->genre_id)
										<td>{{$genre->name}}</td>
									@endif
								@endforeach
								@foreach($formats as $format)
									@if($format->id == $movie->format_id)
										<td>{{$format->name}}</td>
									@endif
								@endforeach
							<td >{!! link_to_route('upload.edit', $title = 'Editar', $parameters = $movie->id, $attributes = ['class'=>'btn btn-primary orangeButton'])!!}
							</td>
						</tr>
					@endforeach
				@endif
			</tbody>
		</table>
		@endif
	@stop
	@section('page-style-files')
		<link href="/css/footable.bootstrap.css" rel="stylesheet">
	@stop

	@section('page-js-files')
		<script src="/js/footable.min.js"></script>
	@stop
	@section('page-js-script')
		<script type="text/javascript">
			var j = jQuery.noConflict();
			jQuery(function(j){
				j('.table').footable({
					"filtering": {
						"enabled": true
					}
				});
			});
		</script>
	@stop
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