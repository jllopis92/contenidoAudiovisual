@if (!Auth::guest())
	@if ((Auth::user()->tipo == "profesor") || (Auth::user()->tipo == "administrador"))
	@extends('layouts.controlPanel')
	@section('content')
		<script src="{!!url('/js/jquery.min.js')!!}"></script>
		<div class="col-md-12" id="createPopup" style="display: none">
			<div class="alert alert-success alert-dismissable fade in">
			    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
			    <strong>Anuncio Creado</strong> El anuncio ha sido creado exitosamente.
		  	</div>
	  	</div>

	  	<div class="col-md-12" id="deletePopup" style="display: none">
			<div class="alert alert-success alert-dismissable fade in">
			    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
			    <strong>Anuncio Eliminado</strong> El anuncio ha sido eliminado exitosamente.
		  	</div>
	  	</div>
		<script type="text/javascript">
			
				var create = {{$create}};
				var j = jQuery.noConflict();
		        j(document).ready(function() {
		        	if(create == 1){
		        		document.getElementById("createPopup").style.display="inline";
					}else if(create == 2){
						document.getElementById("deletePopup").style.display="inline";
					}
		        });
				
		</script>
		<h3 style="margin-bottom: 30px;">Ver Anuncios</h3>
		<table class="table">
			<thead>
				<th>Imagen Referencial</th>
				<th>Video</th>
				<th>Descripción</th>
				<th>Creada</th>
				<th> </th>
			</thead>
			@foreach($advertisings as $advertising)
				<tbody>
					<td>
						<img src="files/{{$advertising->image}}" title="allbum-name" style="width: 75px; height: 75px;"/>
					</td>
					<td>{{$advertising->name}}</td>
					<td>{{$advertising->description}}</td>
					<td>{{$advertising->created_at}}</td>
					<td>
					{!! Form::open(['url' =>'deleteadvertising', 'method'=>'POST']) !!}
						<div class = "form-group" style ="display: none;">
						    {!! Form::label('id', 'id:') !!}
						    {!! Form::text('id', $advertising->id) !!}
						</div>
						{!! Form::submit('Eliminar',['class' =>'btn btn-danger']) !!}
					{!! Form::close() !!}
					</td>
				</tbody>
			@endforeach
		</table>
		{!!$advertisings->render()!!}
	@endsection
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
