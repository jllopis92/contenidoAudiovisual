@extends('layouts.panelprofesor')
@section('content')
	@if (!Auth::guest())
		@if ((Auth::user()->tipo == "profesor") || (Auth::user()->tipo == "administrador"))
			<h3 style="margin-bottom: 30px;">Administrar Usuarios</h3>
			<table class="table">
				<thead>
					<th>Fecha Nacimiento</th>
					<th>Nombre</th>
					<th>Correo Electrónico</th>
					<th>País</th>
					<th>Ciudad</th>
					<th>Sector</th>
					<th>Operacion</th>
				</thead>
				@foreach($users as $user)
					<tbody>
						<td>{{$user->birthday}}</td>
						<td>{{$user->name}}</td>
						<td>{{$user->email}}</td>
						<td>{{$user->country}}</td>
						<td>{{$user->city}}</td>
						<td>{{$user->sector}}</td>
						<td>
						{!! link_to_route('cpanel.edit', $title = 'Editar', $parameters = $user->id, $attributes = ['class'=>'btn btn-primary'])!!}
						</td>
					</tbody>
				@endforeach
			</table>
			{!!$users->render()!!}
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