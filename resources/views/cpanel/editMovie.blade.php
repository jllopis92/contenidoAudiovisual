@extends('layouts.controlPanel')

@section('content')

@if (!Auth::guest())
	@if ((Auth::user()->tipo == "profesor") || (Auth::user()->tipo == "administrador"))
		{!!Form::model($movie, array('id'=>"editMovieForm"), ['route'=>[ 'upload.update',$movie->id],'method'=>'PUT'])!!}
			@include('cpanel.forms.mov')

		{!!Form::submit('Actualizar',['class'=>'btn btn-primary orangeButton', 'value' =>'validate'])!!}
		{!!Form::close()!!}
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
        <link href='/assets/vendor/parsleyjs/src/parsley.css' rel='stylesheet' />
        <link rel="stylesheet" href="http://code.jquery.com/ui/1.10.1/themes/base/jquery-ui.css" />
        @stop

        @section('page-js-files')
        <script src="http://code.jquery.com/ui/1.10.1/jquery-ui.js"></script>
        <script src="/assets/vendor/parsleyjs/dist/parsley.min.js"></script>
		<script type="text/javascript" src="/assets/vendor/parsleyjs/dist/i18n/es.js"></script>
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
                j("#creation_date").datepicker();
            });
           
        </script>
        @stop