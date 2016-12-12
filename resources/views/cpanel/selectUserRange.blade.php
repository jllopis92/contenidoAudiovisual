@extends('layouts.controlPanel')
@section('content')
	@if (!Auth::guest())
		@if ((Auth::user()->tipo == "profesor") || (Auth::user()->tipo == "administrador"))
			<h3 style="margin-bottom: 30px;">Cambio de Privilegios</h3>
			<table class="table">
				<thead>
					<th>Nombre</th>
					<th>Correo Electrónico</th>
					<th>Tipo</th>
					<th>Operacion</th>
				</thead>
				@foreach($users as $user)
					<tbody>
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
						{!!Form::submit('Actualizar',['class'=>'btn btn-primary'])!!}
						</td>
						{!!Form::close()!!}
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