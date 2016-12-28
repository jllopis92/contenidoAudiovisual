@if (!Auth::guest())
	@if ((Auth::user()->tipo == "profesor") || (Auth::user()->tipo == "administrador") || (Auth::user()->id == $user->id))
		@extends('layouts.controlPanel')
		@section('content')
			{!!Form::model($user,['route'=>['cpanel.update',$user->id],'method'=>'PUT'])!!}
				<h3 class="orangeAndBoldText" style="margin-bottom: 30px;">Cambiar Contraseña</h3>
				{{ csrf_field() }}
				<div class="form-group col-md-12">
			
					{!!Form::label('password','Nueva Contraseña:')!!}
					{!!Form::password('password',['class'=>'form-control', 'required'=> ''])!!}
					<div class="alert alert-danger col-xs-10 col-xs-offset-1 col-md-8 col-md-offset-2" id="passwordValidation" style="display: none; margin-top: 10px;"></div>
                </div>
                <div class="form-group col-md-12">
					{!!Form::label('confimPassword','Confirme Nueva Contraseña:')!!}
					{!!Form::password('confimPassword',['class'=>'form-control', 'required'=> ''])!!}
					<div class="alert alert-danger col-xs-10 col-xs-offset-1 col-md-8 col-md-offset-2" id="confimPasswordValidation" style="display: none; margin-top: 10px;"></div>
				</div>
				<div class = "form-group col-md-12">

					{!!Form::submit('Actualizar',['class'=>'btn btn-primary sendButton disabled orangeButton'])!!}
				</div>
			{!!Form::close()!!}
		@stop

		@section('page-style-files')
		@stop

		@section('page-js-files')
			<script type="text/javascript" src="/js/footable.js"></script>
		@stop

		@section('page-js-script')
		<script type="text/javascript">	
			var j = jQuery.noConflict();
            var validPassword = 0;
            var validConfimPassword = 0;
           
            j('#password').on('input',function(e){
                checkPassword();
            });
            j('#confimPassword').on('input',function(e){
                checkConfimPassword();
            });

            function checkForm() {
                if(validPassword == 0 || validConfimPassword == 0){
                    j(".sendButton").attr('class', 'btn btn-primary disabled sendButton orangeButton');
                }
                if(validPassword == 1 && validConfimPassword == 1){
                    j(".sendButton").attr('class', 'btn btn-primary active sendButton orangeButton');
                }               
            }

            function checkPassword(){
                var password = j('#password').val();
                var BLIDRegExpression = /^[a-zA-Z0-9\Ñ\ñ]+$/;
                if(password.length <= 5){
                    document.getElementById("passwordValidation").style.display = "inline";
                    document.getElementById("passwordValidation").innerHTML = 'Minimo de 6 caracteres';
                    validPassword = 0;
                    checkForm();
                }else if(password.length >= 13){
                    document.getElementById("passwordValidation").style.display = "inline";
                    document.getElementById("passwordValidation").innerHTML = 'Máximo de 12 caracteres';
                    validPassword = 0;
                    checkForm();
                }else if (!BLIDRegExpression.test(password)) {
                    document.getElementById("passwordValidation").style.display = "inline";
                    document.getElementById("passwordValidation").innerHTML = 'Solo se permiten letras y numeros';
                    validPassword = 0;
                    checkForm();
                }else{
                    document.getElementById("passwordValidation").style.display = "none";
                    validPassword = 1;
                    checkForm();
                }
            }
            function checkConfimPassword(){
                var confimPassword = j('#confimPassword').val();
                var BLIDRegExpression = /^[a-zA-Z0-9\Ñ\ñ]+$/;
                if(confimPassword.length == 0){
                    document.getElementById("confimPasswordValidation").style.display = "inline";
                    document.getElementById("confimPasswordValidation").innerHTML = 'Campo Obligatorio';
                    validConfimPassword = 0;
                    checkForm();
                }else if (confimPassword != (j('#password').val())) {
                    document.getElementById("confimPasswordValidation").style.display = "inline";
                    document.getElementById("confimPasswordValidation").innerHTML = 'Las contraseñas deben coincidir';
                    validConfimPassword = 0;
                    checkForm();
                }else{
                    document.getElementById("confimPasswordValidation").style.display = "none";
                    validConfimPassword = 1;
                    checkForm();
                }
            }
		</script>
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