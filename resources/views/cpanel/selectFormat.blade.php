@extends('layouts.controlPanel')
@section('content')
	@if (!Auth::guest())
		@if (Auth::user()->tipo == "administrador")
			<h3 class="orangeAndBoldText" style="margin-bottom: 30px;">Administrar Formatos</h3>
			<div class="col-md-8">
				<table class="table">
					<thead>
						<th class="col-md-8" >Nombre</th>
						<th class="col-md-4">Eliminar</th>
					</thead>
					@foreach($formats as $format)
						<tbody>
							<td>{{$format->name}}</td>
							<td>
							{!! Form::open(['url' =>'deleteformat', 'method'=>'POST']) !!}
							<div class = "form-group" style ="display: none;">
							    {!! Form::label('id', 'id:') !!}
							    {!! Form::text('id', $format->id) !!}
							</div>
							{!! Form::submit('Eliminar',['class' =>'btn btn-danger']) !!}
						{!! Form::close() !!}
							</td>
						</tbody>
					@endforeach
				</table>
				{!!$formats->render()!!}
			</div>
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
@endsection