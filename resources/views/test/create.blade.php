@extends('layouts.panelprofesor')
	@section('content')

	{!!Form::open()!!}
	<div id="msj-success" class="alert alert-success alert-dismissible" role="alert" style="display:none">
    		<strong> Test Agregado Correctamente.</strong>
		</div>

		<input type="hidden" name="_token" value="{{ csrf_token() }}" id="token">
		<div>
            <label class="title">First Name</label>
            <input type="text" id="name" name="name" >

            <label class="title">second Name</label>
            <input type="text" id="url" name="url" >
        </div>
		{!!link_to('#', $title='Registrar', $attributes = ['id'=>'registro', 'class'=>'btn btn-primary'], $secure = null)!!}
	{!!Form::close()!!}


	{{-- <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	
	<button type="submit" id="test" value="send">Alert</button>
	{!! Form::open() !!}
		<div id="msj-success" class="alert alert-success alert-dismissible" role="alert" style="display:none">
    		<strong> Genero Agregado Correctamente.</strong>
		</div>

		<input type="hidden" name="_token" value="{{ csrf_token() }}" id="token">

        <div>
            <label class="title">First Name</label>
            <input type="text" id="name" name="name" >
        </div>
        <div>
            <label class="title">Name</label>
            <input type="text" id="name2" name="name2" >
        </div>
        {!!link_to('#', $title='Registrar', $attributes = ['id'=>'registro', 'class'=>'btn btn-primary'], $secure = null)!!}
 	{!!Form::close()!!}
 --}}
{{-- 	{!!Form::open()!!}
	<div id="msj-success" class="alert alert-success alert-dismissible" role="alert" style="display:none">
    		<strong> Genero Agregado Correctamente.</strong>
		</div>

		<input type="hidden" name="_token" value="{{ csrf_token() }}" id="token">
		<div class = "form-group">
		{!!Form::label('name','Nombre: ')!!}
		{!!Form::text('name',null, ['id'=>'name','class'=>'form-control', 'placeholder' => 'Ingresa el nombre'])!!}
		<input type="submit" id="registro"  name="registro" value="Submit">

	{!!Form::close()!!} --}}
@stop

@section('page-js-script')
     
@stop