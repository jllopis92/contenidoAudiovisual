@if (!Auth::guest())
	@if ((Auth::user()->tipo == "profesor") || (Auth::user()->tipo == "administrador") || (Auth::user()->id == $user->id))
		@extends('layouts.panelprofesor')
		@section('content')
			{!!Form::model($user,['route'=>['cpanel.update',Auth::user()->id],'method'=>'PUT'])!!}
				<h3 style="margin-bottom: 30px;">Cambiar Contraseña</h3>
				<div class="form-group">
					{!!Form::label('lastPassword','Contraseña Actual:')!!}
					{!!Form::password('lastPassword',['class'=>'form-control', 'required'=> ''])!!}

					{!!Form::label('password','Nueva Contraseña:')!!}
					{!!Form::password('password',['class'=>'form-control', 'required'=> ''])!!}

					{!!Form::label('confimPassword','Confirme Nueva Contraseña:')!!}
					{!!Form::password('confimPassword',['class'=>'form-control', 'required'=> ''])!!}
				</div>

			{!!Form::submit('Actualizar',['class'=>'btn btn-primary'])!!}
			{!!Form::close()!!}
		@stop
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