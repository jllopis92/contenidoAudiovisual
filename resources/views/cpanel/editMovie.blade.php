@extends('layouts.panelprofesor')

@section('content')

{!!Form::model($movie,['route'=>['upload.update',$movie->id],'method'=>'PUT'])!!}
	@include('cpanel.forms.mov')

{!!Form::submit('Actualizar',['class'=>'btn btn-primary'])!!}
{!!Form::close()!!}

@stop