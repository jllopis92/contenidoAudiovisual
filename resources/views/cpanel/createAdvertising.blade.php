
@if (!Auth::guest())
	@if ((Auth::user()->tipo == "profesor") || (Auth::user()->tipo == "administrador"))
	@extends('layouts.controlPanel')
	@section('content')
		@if (count($movies) === 0)
		<h3 class="orangeAndBoldText" style="margin-bottom: 30px;">Error: No se encuentran videos en el servidor</h3>
		@elseif (count($movies) >= 1)

		<h3 style="margin-bottom: 30px;">Seleccione Video para Anuncio</h3>
		{!! Form::open(['id' => 'newAdvertising', 'route' =>'advertising.store', 'method'=>'POST', 'data-parsley-validate'=>'' ]) !!}

		<table class="table">
			<thead>
				<th>Nombre</th>
				<th>Categoria</th>
				<th>Duración</th>
				<th>Agregar</th>
			</thead>
			@foreach($movies as $movie)
			<tbody>
				<td>{{$movie->name}}</td>
				<td>{{$movie->category}} {{$movie->category2}}</td>
				<td>{{$movie->duration}}</td>
				<td>
				<p style ="display: none;"> {!! Form::label('{{$movie->id}}', 'Seleccionar * :') !!} </p>
		    		<p ><input name="id" id="id" value="{{$movie->id}}" type='radio'></p>
				</td>
			</tbody>
			{{-- @endif --}}
			@endforeach
		</table>
		{!!$movies->render()!!}
		{!! Form::submit('Agregar',['class' =>'btn btn-primary', 'value' =>'validate']) !!}
		{!! Form::close() !!}
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
