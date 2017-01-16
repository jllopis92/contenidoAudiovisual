@extends('layouts.controlPanel')
@section('content')
	@if (!Auth::guest())
		@if ((Auth::user()->tipo == "profesor") || (Auth::user()->tipo == "administrador"))
			<h3 class="orangeAndBoldText" style="margin-bottom: 30px;">Cambio de Privilegios</h3>
			<table class="table" data-filtering="true" data-paging="true" data-sorting="true">
				<thead>
					<th data-type="html">Nombre</th>
					<th data-type="html">Correo Electrónico</th>
					<th data-type="html">Tipo</th>
					<th data-type="html">Operacion</th>
				</thead>
				<tbody>
				@foreach($users as $user)
						<tr>
							{!!Form::model($user,['route'=>['user.update',$user->id],'method'=>'PUT'])!!}
							<td>{{$user->name}}</td>
							<td>{{$user->email}}</td>
							<td>
								@if (Auth::user()->tipo == "profesor")
									{!!Form::select('tipo', Config::get('enums.profesor_types'), null, ['placeholder' => 'Seleccione Tipo de Usuario']) !!}
								@else
									{!!Form::select('tipo', Config::get('enums.types'), null, ['placeholder' => 'Seleccione Tipo de Usuario']) !!}
								@endif
							</td>
							<td>
							{!!Form::submit('Actualizar',['class'=>'btn btn-primary orangeButton'])!!}
							</td>
							{!!Form::close()!!}
						</tr>
				@endforeach
				</tbody>
			</table>
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