@extends('layouts.controlPanel')
@section('content')
	@if (!Auth::guest())
		@if ((Auth::user()->tipo == "profesor") || (Auth::user()->tipo == "administrador"))
			<h3 class="orangeAndBoldText" style="margin-bottom: 30px;">Cambiar Contraseña</h3>
			<table class="table" data-filtering="true" data-paging="true" data-sorting="true">
				<thead>
					<th>Nombre</th>
					<th>Correo Electrónico</th>
					<th>Tipo</th>
					<th data-type="html">Operacion</th>
				</thead>
				<tbody>
					@foreach($users as $user)
						<tr>
							<td>{{$user->name}}</td>
							<td>{{$user->email}}</td>
							<td>{{$user->tipo}}</td>
							<td>
							{!! link_to_route('user.edit', $title = 'Cambiar Contraseña', $parameters =  $user->id, $attributes = ['class'=>'btn btn-primary orangeButton'])!!}
							</td>
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