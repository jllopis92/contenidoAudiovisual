{{-- <link rel="stylesheet" href="http://code.jquery.com/ui/1.10.1/themes/base/jquery-ui.css" />
<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
<script src="http://code.jquery.com/ui/1.10.1/jquery-ui.js"></script> --}}

@if (!Auth::guest())
	@if ((Auth::user()->tipo == "profesor") || (Auth::user()->tipo == "administrador") || (Auth::user()->id == $user->id))
		@extends('layouts.controlPanel')
		@section('content')
			{!!Form::model($user,['route'=>['cpanel.update',$user->id],'method'=>'PUT'])!!}
				<h3 class="orangeAndBoldText" style="margin-bottom: 30px;">Editar Perfil</h3>
				@include('cpanel.forms.usrReg')

			{!!Form::submit('Actualizar',['class'=>'btn btn-primary orangeButton'])!!}
			{!!Form::close()!!}
		@stop

        @section('page-style-files')
        <link rel="stylesheet" href="http://code.jquery.com/ui/1.10.1/themes/base/jquery-ui.css" />
        @stop

        @section('page-js-files')
        <script src="http://code.jquery.com/ui/1.10.1/jquery-ui.js"></script>
        @stop

        @section('page-js-script')

        <script>
            var j = jQuery.noConflict();
            j.datepicker.regional['es'] = {
                closeText: 'Cerrar',
                prevText: '<Ant',
                nextText: 'Sig>',
                currentText: 'Hoy',
                monthNames: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
                monthNamesShort: ['Ene','Feb','Mar','Abr', 'May','Jun','Jul','Ago','Sep', 'Oct','Nov','Dic'],
                dayNames: ['Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado'],
                dayNamesShort: ['Dom','Lun','Mar','Mié','Juv','Vie','Sáb'],
                dayNamesMin: ['Do','Lu','Ma','Mi','Ju','Vi','Sá'],
                weekHeader: 'Sm',
                dateFormat: 'yy-mm-dd',
                firstDay: 1,
                isRTL: false,
                showMonthAfterYear: false,
                yearSuffix: ''
            };
            j.datepicker.setDefaults(j.datepicker.regional['es']);
            j(function () {
                j("#birthday").datepicker();
            });
           
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
