
@if (!Auth::guest())
	@if ((Auth::user()->tipo == "profesor") || (Auth::user()->tipo == "administrador") || (Auth::user()->id == $user->id))
		@extends('layouts.panelprofesor')
		@section('content')
			{!!Form::model($user,['route'=>['cpanel.update',Auth::user()->id],'method'=>'PUT'])!!}
				<h3 style="margin-bottom: 30px;">Editar Perfil</h3>
				@include('cpanel.forms.usr')

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
