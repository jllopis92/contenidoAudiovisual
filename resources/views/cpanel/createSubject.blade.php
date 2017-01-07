@if (!Auth::guest())
	@if (Auth::user()->tipo == "administrador")
		@extends('layouts.controlPanel')
		@section('content')
			<div class="col-md-6">
				<h3 class="orangeAndBoldText" style="margin-bottom: 30px;">Crear Asignatura</h3>
				{!! Form::open(['id' => 'newSubject', 'route' =>'subject.store', 'method'=>'POST']) !!}
					<div class="form-group col-sm-12">
						{!! Form::label('name', 'Nombre * :') !!}
				        {!! Form::text('name', null, ['class'=> 'form-control', 'required'=> '']) !!}
				        <div class="alert alert-danger col-xs-12" id="nameValidation" style="display: none">
				        </div>
			        </div>
			        <div class="form-group col-sm-12">
				        {!! Form::label('profesor_id', 'Profesor a Cargo * :') !!}
	                	{!! Form::select('profesor_id', $users) !!}
                	</div>
			        <div style="margin-top: 10px;">
			        	{!! Form::submit('Agregar',['class' =>'btn btn-primary orangeButton sendButton disabled']) !!}
			        </div>
					
				{!! Form::close() !!}
			</div>
		@stop
		@section('page-style-files')

	    @stop
	    @section('page-js-files')
	        <script src="http://code.jquery.com/ui/1.10.1/jquery-ui.js"></script>
	    @stop

	    @section('page-js-script')
	    	<script type="text/javascript">
	            var j = jQuery.noConflict();
	            var validName = 1;
	            
	            j('#name').on('input',function(e){
	                checkName();
	            });

	            function checkName(){
	                var name = j('#name').val();
	                var BLIDRegExpression = /^[a-zA-Z0-9\ \Ñ\ñ\u00C0-\u017F]+$/;
	                if(name.length == 0){
	                    document.getElementById("nameValidation").style.display = "inline";
	                    document.getElementById("nameValidation").innerHTML = 'Campo Obligatorio';
	                    validName = 0;
	                    checkForm();
	                }else if (!BLIDRegExpression.test(name)) {
	                    document.getElementById("nameValidation").style.display = "inline";
	                    document.getElementById("nameValidation").innerHTML = 'El Campo Contiene Caracteres Invalidos';
	                    validName = 0;
	                    checkForm();
	                }else{
	                    document.getElementById("nameValidation").style.display = "none";
	                    validName = 1;
	                    checkForm();
	                }
	            }
	            function checkForm() {
	                if(validName == 0){
	                    j(".sendButton").attr('class', 'btn btn-primary orangeButton disabled sendButton');
	                }
	                if(validName == 1){
	                    j(".sendButton").attr('class', 'btn btn-primary orangeButton active sendButton');
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