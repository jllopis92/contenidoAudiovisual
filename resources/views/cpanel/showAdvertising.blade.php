@extends('layouts.panelprofesor')
	@section('content')
	<table class="table">
		<thead>
			<th>Imagen Referencial</th>
			<th>Video</th>
			<th>Descripción</th>
			<th>Prioridad</th>
			<th> </th>
		</thead>
		@foreach($advertisings as $advertising)
			<tbody>
				<td>{{$advertising->image}}</td>
				<td>{{$advertising->name}}</td>
				<td>{{$advertising->description}}</td>
				<td>{{$advertising->priority}}</td>
				<td>
				{!! link_to_route('cpanel.edit', $title = 'Eliminar', $parameters = $advertising->id, $attributes = ['class'=>'btn btn-danger'])!!}
				</td>
			</tbody>
		@endforeach
	</table>
	{!!$advertisings->render()!!}
@endsection