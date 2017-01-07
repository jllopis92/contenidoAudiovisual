@extends('layouts.controlPanel')
@section('content')
	@if (!Auth::guest())
		@if (Auth::user()->tipo == "administrador")
			<h3 class="orangeAndBoldText" style="margin-bottom: 30px;">Administrar Asignaturas</h3>
			<table class="table">
				<thead>
					<th>Nombre</th>
					<th>Profesor a Cargo</th>
					<th>Eliminar</th>
				</thead>
				@foreach($subjects as $subject)
					<tbody>
						<td>{{$subject->name}}</td>
						<td>{{$subject->profesor_id}}</td>
						<td>
						{!! Form::open(['url' =>'deletesubject', 'method'=>'POST']) !!}
						<div class = "form-group" style ="display: none;">
						    {!! Form::label('id', 'id:') !!}
						    {!! Form::text('id', $subject->id) !!}
						</div>
						{!! Form::submit('Eliminar',['class' =>'btn btn-danger']) !!}
					{!! Form::close() !!}
						</td>
					</tbody>
				@endforeach
			</table>
			{!!$subjects->render()!!}
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