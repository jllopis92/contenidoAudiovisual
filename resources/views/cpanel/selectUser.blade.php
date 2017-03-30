@extends('layouts.controlPanel')
@section('content')
	@if (!Auth::guest())
		@if (Auth::user()->tipo == "administrador")
			<h3 class="orangeAndBoldText" style="margin-bottom: 30px; padding-left: 20px;">Administrar Usuarios</h3>
			<div style="padding-left: 20px; padding-right: 20px;">
				<table class="table" data-filtering="true" data-paging="true" data-sorting="true" >
				<thead>
					<th>Nombre</th>
					<th>Correo Electrónico</th>
					<th>Tipo</th>
					<th>País</th>
					<th>Ciudad</th>
					{{-- <th>Sector</th> --}}
					<th data-type="html">Operacion</th>
				</thead>
				<tbody>
					@foreach($users as $user)
						<tr>
							<td>{{$user->name}}</td>
							<td>{{$user->email}}</td>
							<td>{{$user->tipo}}</td>
							<td>{{$user->country}}</td>
							<td>{{$user->city}}</td>
							{{-- <td>{{$user->sector}}</td> --}}
							<td>
							{!! link_to_route('cpanel.edit', $title = 'Editar', $parameters = $user->id, $attributes = ['class'=>'btn btn-primary orangeButton'])!!}
							</td>
						</tr>
					
					@endforeach
				</tbody>
			</table>
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