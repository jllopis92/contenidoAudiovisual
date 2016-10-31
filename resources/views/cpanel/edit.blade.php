@extends('layouts.panelprofesor')

@section('content')
{!!Form::model($user,['route'=>['cpanel.update',Auth::user()->id],'method'=>'PUT'])!!}
	@include('cpanel.forms.usr')

{!!Form::submit('Actualizar',['class'=>'btn btn-primary'])!!}
{!!Form::close()!!}

@stop