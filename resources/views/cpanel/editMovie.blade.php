@extends('layouts.panelprofesor')

@section('content')

{!!Form::model($movie,['id'="editMovieForm", 'route'=>['upload.update',$movie->id],'method'=>'PUT'])!!}
	@include('cpanel.forms.mov')

{!!Form::submit('Actualizar',['class'=>'btn btn-primary'])!!}
{!!Form::close()!!}

 <!-- Scripts -->
 <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
 <script src="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.1/js/bootstrap.min.js"></script>

 <!-- Laravel Javascript Validation -->
 <script type="text/javascript" src="{{ asset('vendor/jsvalidation/js/jsvalidation.js', '#editMovieForm')}}"></script>
 {!! $validator !!}

@stop