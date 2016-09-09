@extends('layouts.panelprofesor')

@section('content')
<link href='assets/vendor/parsleyjs/src/parsley.css' rel='stylesheet' />
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
<script src="assets/vendor/parsleyjs/dist/parsley.min.js"></script>
<script type="text/javascript" src="assets/vendor/parsleyjs/dist/i18n/es.js"></script>

{!!Form::model($movie, array('id'=>"editMovieForm"), ['route'=>[ 'upload.update',$movie->id],'method'=>'PUT'])!!}
	@include('cpanel.forms.mov')

{!!Form::submit('Actualizar',['class'=>'btn btn-primary', 'value' =>'validate'])!!}
{!!Form::close()!!}


@stop