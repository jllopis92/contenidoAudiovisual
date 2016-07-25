@extends('layouts.panelprofesor')
@section('content')
@if (count($movies) === 0)
... html showing no articles found
@elseif (count($movies) >= 1)
<h3>Aprobar Video</h3>
<table class="table">
	@foreach($movies as $movie)
	<tbody>
		<td>
			<h4>{{$movie->name}}</h4>
			<a><img src="files/{{$movie->imageRef}}" title="allbum-name" style="width: 110px; height: 110px;"/></a>
		</td>
		<td style="vertical-align: middle;">
			@foreach($users as $user)
				@if ($movie->usuario_id == $user->id)
					<p>Fecha: {{ date('d-m-y', strtotime($movie->created_at)) }}</p>
		            <p>Subido por: {{$user->name}}</p>
		            <p>Descripción: {{$movie->description}}</p>
	            @endif
	        @endforeach
		</td>
		<td style="vertical-align: middle;">{!! link_to_route('cpanel.edit', $title = 'Aprobar', $parameters = $movie->id, $attributes = ['class'=>'btn btn-primary'])!!}
		{!! link_to_route('cpanel.edit', $title = 'Reprobar', $parameters = $movie->id, $attributes = ['class'=>'btn btn-danger'])!!}
		</td>
	</tbody>
	@endforeach
</table>
{!!$movies->render()!!}
@endif
@endsection