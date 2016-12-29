@extends('layouts.controlPanel')

@section('content')

@if (!Auth::guest())
	@if ((Auth::user()->tipo == "profesor") || (Auth::user()->tipo == "administrador"))
		{!!Form::model($movie, array('id'=>"editMovieForm"), ['route'=>[ 'upload.update',$movie->id],'method'=>'PUT'])!!}
            <div class = "form-group">
                {!! Form::label('name', 'Nombre:') !!}
                {!! Form::text('name', null, ['class'=> 'form-control', 'required'=> '']) !!}
            </div>

            <div class = "form-group">
                {!! Form::label('description', 'Descripcion:') !!}
                {!! Form::textarea('description', null, ['class'=> 'form-control', 'required'=> '']) !!}
            </div>

            <div class = "form-group">
                {!! Form::label('language', 'Idioma:') !!}
                {!!Form::text('language',null,['class'=>'form-control', 'required'=> ''])!!}
            </div>

            <div class = "form-group">
                {!! Form::label('asignatura_id', 'Asignatura:') !!}
                {!!Form::text('asignatura_id',null,['class'=>'form-control', 'required'=> ''])!!}
            </div>

            <div class = "form-group">
                {!! Form::label('category', 'Categoría:') !!}
                {{ Form::select('category', ['largometraje' => 'Largometraje', 'mediometraje' => 'Mediometraje ', 'cortometraje' => 'Cortometraje '], null, ['class' => 'form-control', 'required'=> '']) }}
                {{-- {!!Form::text('category',null,['class'=>'form-control'])!!} --}}
            </div>
            <div class = "form-group">
                {!! Form::hidden('category2', 'Categoría2:') !!}
                {{ Form::select('category', ['ficcion' => 'Ficción', 'animacion' => 'Animación ', 'documental' => 'Documental ', 'experimental' => 'Experimental '], null, ['class' => 'form-control', 'required'=> '']) }}
                {{-- {!!Form::text('category',null,['class'=>'form-control'])!!} --}}
            </div>
            <div class = "form-group">
                {!! Form::label('shooting_format', 'Formato de Rodaje:') !!}
                {{ Form::select('shooting_format', ['4K' => '4K', '2K' => '2K', 'HD' => 'HD', 'MiniDV' => 'MiniDV'], null, ['class' => 'form-control', 'required'=> '']) }}
            </div>

            <div class = "form-group">
                {!! Form::label('creation_date', 'Fecha Creación:') !!}
                {!! Form::text('creation_date', null, ['class'=> 'form-control', 'required'=> '']) !!}
            </div>

            <div class = "form-group">
                {!! Form::label('production_year', 'Año de Produccion:') !!}
                {!! Form::text('production_year', null, ['class'=> 'form-control']) !!}
            </div>

            <div class = "form-group">
                {!! Form::label('direction', 'Dirección:') !!}
                {!! Form::text('direction', null, ['class'=> 'form-control']) !!}
            </div>

            <div class = "form-group">
                {!! Form::label('direction_assistant', 'Asistente de Dirección:') !!}
                {!! Form::text('direction_assistant', null, ['class'=> 'form-control']) !!}
            </div>

            <div class = "form-group">
                {!! Form::label('casting', 'Casting:') !!}
                {!! Form::text('casting', null, ['class'=> 'form-control']) !!}
            </div>

            <div class = "form-group">
                {!! Form::label('continuista', 'Continuista:') !!}
                {!! Form::text('continuista', null, ['class'=> 'form-control']) !!}
            </div>

            <div class = "form-group">
                {!! Form::label('script', 'Guion:') !!}
                {!! Form::text('script', null, ['class'=> 'form-control', 'required'=> '']) !!}
            </div>

            <div class = "form-group">
                {!! Form::label('production', 'Produccion:') !!}
                {!! Form::text('production', null, ['class'=> 'form-control', 'required'=> '']) !!}
            </div>

            <div class = "form-group">
                {!! Form::label('production_assistant', 'Asistente de Produccion:') !!}
                {!! Form::text('production_assistant', null, ['class'=> 'form-control', 'required'=> '']) !!}
            </div>

            <div class = "form-group">
                {!! Form::label('photografic_direction', 'Dirección de Fotografia:') !!}
                {!! Form::text('photografic_direction', null, ['class'=> 'form-control']) !!}
            </div>

            <div class = "form-group">
                {!! Form::label('camara', 'Camara:') !!}
                {!! Form::text('camara', null, ['class'=> 'form-control']) !!}
            </div>

            <div class = "form-group">
                {!! Form::label('camara_assistant', 'Asistente de Camara:') !!}
                {!! Form::text('camara_assistant', null, ['class'=> 'form-control']) !!}
            </div>

            <div class = "form-group">
                {!! Form::label('art_direction', 'Direccion de Arte:') !!}
                {!! Form::text('art_direction', null, ['class'=> 'form-control']) !!}
            </div>

            <div class = "form-group">
                {!! Form::label('sonorous_register', 'Registro Sonoro:') !!}
                {!! Form::text('sonorous_register', null, ['class'=> 'form-control', 'required'=> '']) !!}
            </div>

            <div class = "form-group">
                {!! Form::label('mounting', 'Montaje:') !!}
                {!! Form::text('mounting', null, ['class'=> 'form-control', 'required'=> '']) !!}
            </div>

            <div class = "form-group">
                {!! Form::label('image_postproduction', 'Post-produccion de Imagen:') !!}
                {!! Form::text('image_postproduction', null, ['class'=> 'form-control', 'required'=> '']) !!}
            </div>

            <div class = "form-group">
                {!! Form::label('sound_postproduction', 'Post-produccion de Sonido:') !!}
                {!! Form::text('sound_postproduction', null, ['class'=> 'form-control', 'required'=> '']) !!}
            </div>

            <div class = "form-group">
                {!! Form::label('catering', 'Catering:') !!}
                {!! Form::text('catering', null, ['class'=> 'form-control']) !!}
            </div>

            <div class = "form-group">
                {!! Form::label('music', 'Música:') !!}
                {!! Form::text('music', null, ['class'=> 'form-control']) !!}
            </div>

            <div class = "form-group">
                {!! Form::label('actors', 'Actores:') !!}
                {!! Form::text('actors', null, ['class'=> 'form-control', 'required'=> '']) !!}
            </div>
			{{-- @include('cpanel.forms.mov') --}}

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