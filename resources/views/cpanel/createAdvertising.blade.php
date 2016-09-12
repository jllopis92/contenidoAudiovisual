@extends('layouts.panelprofesor')
@section('content')


@if (count($movies) === 0)
... No existen videos disponibles
@elseif (count($movies) >= 1)

{!! Form::open(['id' => 'newAdvertising', 'route' =>'advertising.store', 'method'=>'POST', 'data-parsley-validate'=>'' ]) !!}

<H4 style="margin-top: 20px">Seleccione Video para Anuncio</H4>

<table class="table">
	<thead>
		<th>Nombre</th>
		<th>Categoria</th>
		<th>Duración</th>
		<th>Agregar</th>
	</thead>
	@foreach($movies as $movie)
	{{-- @if($movies->$state == 1) --}}
	<tbody>
		<td>{{$movie->name}}</td>
		<td>{{$movie->category}} {{$movie->category2}}</td>
		<td>{{$movie->duration}}</td>
		<td>
		<p style ="display: none;"> {!! Form::label('{{$movie->id}}', 'Seleccionar * :') !!} </p>
    		<p ><input name="{{$movie->id}}" id="{{$movie->id}}" value="{{$movie->id}}" type='radio'></p>
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