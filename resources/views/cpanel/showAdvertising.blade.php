@if (!Auth::guest())
	@if ((Auth::user()->tipo == "profesor") || (Auth::user()->tipo == "administrador"))
	@extends('layouts.controlPanel')
	@section('content')
		
		<h3 style="margin-bottom: 30px;">Ver Anuncios</h3>
		<table class="table">
			<thead>
				<th>Imagen Referencial</th>
				<th>Video</th>
				<th>Descripción</th>
				<th>Creada</th>
				<th> </th>
			</thead>
			@foreach($advertisings as $advertising)
				<tbody>
					<td>
						<img src="files/{{$advertising->image}}" title="allbum-name" style="width: 75px; height: 75px;"/>
					</td>
					<td>{{$advertising->name}}</td>
					<td>{{$advertising->description}}</td>
					<td>{{$advertising->created_at}}</td>
					<td>
					{!! Form::open(['url' =>'deleteadvertising', 'method'=>'POST']) !!}
						<div class = "form-group" style ="display: none;">
						    {!! Form::label('id', 'id:') !!}
						    {!! Form::text('id', $advertising->id) !!}
						</div>
						{!! Form::submit('Eliminar',['class' =>'btn btn-danger']) !!}
					{!! Form::close() !!}
					</td>
				</tbody>
			@endforeach
		</table>
		{!!$advertisings->render()!!}
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
