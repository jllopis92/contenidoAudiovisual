

<div class="form-group">
	{!!Form::label('nombre','Nombre:')!!}
	{!!Form::text('name',null,['class'=>'form-control', 'required'=> ''])!!}
</div>
<div class="form-group">
	{!!Form::label('email','Correo:')!!}
	{!!Form::text('email',null,['class'=>'form-control', 'required'=> ''])!!}
</div>
<div class="form-group">
	{!!Form::label('password','Contraseña:')!!}
	{!!Form::password('password',['class'=>'form-control', 'required'=> ''])!!}
</div>
<div class="form-group">
	{!!Form::label('birthday','Fecha Nacimiento:')!!}
	{!!Form::text('birthday',null,['class'=>'form-control', 'required'=> ''])!!}
</div>
<div class="form-group">
	{!!Form::label('zone','Zona:')!!}
	{!!Form::text('zone',null,['class'=>'form-control','required'=> ''])!!}
</div>
<div class="form-group">
	{!!Form::label('country','País:')!!}
	{!!Form::text('country',null,['class'=>'form-control','required'=> ''])!!}
</div>
<div class="form-group">
	{!!Form::label('region','Región:')!!}
	{!!Form::text('region',null,['class'=>'form-control','required'=> ''])!!}
</div>
<div class="form-group">
	{!!Form::label('city','Ciudad:')!!}
	{!!Form::text('city',null,['class'=>'form-control','required'=> ''])!!}
</div>
<div class="form-group">
	{!!Form::label('sector','Sector:')!!}
	{!!Form::text('sector',null,['class'=>'form-control','required'=> ''])!!}
</div>