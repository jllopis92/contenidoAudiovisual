@extends('layouts.panelprofesor')
@section('content')
@if (count($movies) === 0)
... html showing no articles found
@elseif (count($movies) >= 1)

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
		@if ($movie->state == 0 )
		<td>{!! link_to_route('cpanel.edit', $title = 'Aprobar', $parameters = $movie->id, $attributes = ['class'=>'btn btn-primary'])!!}
		</td>
		@else
		<td>
		{!! link_to_route('cpanel.edit', $title = 'Reprobar', $parameters = $movie->id, $attributes = ['class'=>'btn btn-danger'])!!}
		</td>
		@endif
	</tbody>
	@endforeach
</table>
{!!$movies->render()!!}
@endif
@endsection