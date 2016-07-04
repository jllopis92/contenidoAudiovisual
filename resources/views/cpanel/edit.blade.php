@extends('layouts.app')
@section('content')
{!!Form::model($user,['route'=>['cpanel.update',$user],'method'=>'PUT'])!!}
<div class="form-group">
	{!!Form::label('nombre','Nombre:')!!}
	{!!Form::text('name',null,['class'=>'form-control','placeholder'=>'Ingresa el Nombre del usuario'])!!}
</div>
<div class="form-group">
	{!!Form::label('email','Correo:')!!}
	{!!Form::text('email',null,['class'=>'form-control','placeholder'=>'Ingresa el Nombre del usuario'])!!}
</div>
<div class="form-group">
	{!!Form::label('password','Contraseña:')!!}
	{!!Form::password('password',['class'=>'form-control','placeholder'=>'Ingresa el Nombre del usuario'])!!}
</div>
<div class="form-group">
	{!!Form::label('birthday','Fecha Nacimiento:')!!}
	{!!Form::text('birthday',null,['class'=>'form-control','placeholder'=>'Ingresa el Nombre del usuario'])!!}
</div>
<div class="form-group">
	{!!Form::label('zone','Zona:')!!}
	{!!Form::text('zone',null,['class'=>'form-control','placeholder'=>'Ingresa el Nombre del usuario'])!!}
</div>
<div class="form-group">
	{!!Form::label('country','País:')!!}
	{!!Form::text('country',null,['class'=>'form-control','placeholder'=>'Ingresa el Nombre del usuario'])!!}
</div>
<div class="form-group">
	{!!Form::label('region','Región:')!!}
	{!!Form::text('region',null,['class'=>'form-control','placeholder'=>'Ingresa el Nombre del usuario'])!!}
</div>
<div class="form-group">
	{!!Form::label('city','Ciudad:')!!}
	{!!Form::text('city',null,['class'=>'form-control','placeholder'=>'Ingresa el Nombre del usuario'])!!}
</div>
<div class="form-group">
	{!!Form::label('sector','Sector:')!!}
	{!!Form::text('sector',null,['class'=>'form-control','placeholder'=>'Ingresa el Nombre del usuario'])!!}
</div>
<div class="form-group">
	{!!Form::label('tipo','Tipo:')!!}
	{!!Form::text('tipo',null,['class'=>'form-control','placeholder'=>'Ingresa el Nombre del usuario'])!!}
</div>

{!!Form::submit('Actualizar',['class'=>'btn btn-primary'])!!}
{!!Form::close()!!}

{!!Form::open(['route'=>['cpanel.destroy', $user], 'method' => 'DELETE'])!!}
{!!Form::submit('Eliminar',['class'=>'btn btn-danger'])!!}
{!!Form::close()!!}

@endsection
