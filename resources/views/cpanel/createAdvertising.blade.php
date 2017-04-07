@if (!Auth::guest())
	@if ((Auth::user()->tipo == "profesor") || (Auth::user()->tipo == "administrador"))
	@extends('layouts.controlPanel')
	@section('content')
		<div class="col-md-12" style="margin-top: 20px">
			<label class=" col-md-12"> Selecione tipo de anuncio: </label>
			<div class="radio col-md-6" style="margin-left: 20px">
				<label class="radio-inline col-xs-12 col-sm-3" style="
				    margin-left: 0px;
				    padding-right: 0px;
				    padding-left: 0px;
				    padding-bottom: 5px;
				">
				<input type="radio" name="aorb" onClick="showVideo()" checked="checked"> Para Videos</label>
				<label class="radio-inline col-xs-12 col-sm-3" style="
				    margin-left: 0px;
				    padding-right: 0px;
				    padding-left: 0px;
				    padding-bottom: 5px;
				">
				<input type="radio" name="aorb" onClick="showPersonalizate()"> Personalizado</label>
			</div>
			<div class="col-md-12" id="videos">
				@if (count($movies) === 0)
				<h3 class="orangeAndBoldText" style="margin-bottom: 30px; padding-left: 15px;">Error: No se encuentran videos en el servidor</h3>
				@elseif (count($movies) >= 1)

				<h3 style="margin-bottom: 30px; padding-left: 15px;">Seleccione Video para Anuncio</h3>
				{!! Form::open(['id' => 'newAdvertising', 'route' =>'advertising.store', 'method'=>'POST' ]) !!}

				<div class="col-md-10">
					<table class="table" data-filtering="true" data-paging="true" data-sorting="true">
						<thead>
							<th data-type="html">Nombre</th>
							<th data-type="html">Categoria</th>
							<th data-type="html">Duración</th>
							<th data-type="html">Agregar</th>
						</thead>
						<tbody>
							@foreach($movies as $movie)
								<tr>
									<td data-type="html">{{$movie->name}}</td>
									<td data-type="html">{{$movie->category}} {{$movie->category2}}</td>
									<td data-type="html">{{$movie->duration}}</td>
									<td data-type="html">
									<p style ="display: none;"> {!! Form::label('{{$movie->id}}', 'Seleccionar * :') !!} </p>
							    		<p ><input name="id" id="id" value="{{$movie->id}}" type='radio'></p>
									</td>
								</tr>
							@endforeach
						</tbody>
					</table>
					{!! Form::submit('Agregar',['class' =>'btn btn-primary', 'value' =>'validate']) !!}
					{!! Form::close() !!}
					@endif
					{{-- {!!$formats->render()!!} --}}
				</div>
				{{-- <table class="table">
					<thead>
						<th>Nombre</th>
						<th>Categoria</th>
						<th>Duración</th>
						<th>Agregar</th>
					</thead>
					@foreach($movies as $movie)
					<tbody>
						<td>{{$movie->name}}</td>
						<td>{{$movie->category}} {{$movie->category2}}</td>
						<td>{{$movie->duration}}</td>
						<td>
						<p style ="display: none;"> {!! Form::label('{{$movie->id}}', 'Seleccionar * :') !!} </p>
				    		<p ><input name="id" id="id" value="{{$movie->id}}" type='radio'></p>
						</td>
					</tbody>
					@endforeach
				</table> --}}
				{{-- {!!$movies->render()!!} --}}
				
			</div>

			<div id="personalizado" style="display: none;">
				<div class="col-xs-12 col-md-6">
					{!! Form::open(['id' => 'newAdvertising', 'route' =>'advertising.store', 'method'=>'POST', 'files'=> true ]) !!}
						<div class = "form-group col-sm-12" style="display: none">
			                {!! Form::label('id', 'Id * :') !!}
			                {!! Form::text('id', 0 ) !!}
		                </div>
						<div class = "form-group col-md-12">
	                        {!! Form::label('name', 'Título * :') !!}
	                        {!! Form::text('name', null, ['class'=> 'form-control', 'required'=> '']) !!}
	                        <div class="alert alert-danger col-xs-12" id="nameValidation" style="display: none">
	                        </div>
                    	</div>
                    	<div class = "form-group col-md-12">
	                        {!! Form::label('description', 'Descripción * :') !!}
	                        {!! Form::text('description', null, ['class'=> 'form-control', 'required'=> '']) !!}
	                        <div class="alert alert-danger col-xs-12" id="descriptionValidation" style="display: none">
	                        </div>
                    	</div>
                    	<div class = "form-group col-md-12">
	                        {!! Form::label('link', 'Enlace (Opcional):') !!}
	                        {!! Form::text('link', null, ['class'=> 'form-control']) !!}
                    	</div>
                    	<div class = "form-group col-md-12">
	                        <div class = "form-group">
	                            {!! Form::label('image', 'Imagen de Fondo:') !!}
	                            <input id="image" name="image" type="file" accept=".jpg,.jpeg,.png" />
	                        </div>
	                    </div>
	                    <div class = "form-group col-md-12">
							{!! Form::submit('Agregar',['class' =>'btn btn-primary', 'value' =>'validate']) !!}
						</div>
					{!! Form::close() !!}
				</div>
				
			</div>
		</div>
		@stop
		@section('page-style-files')
			<link href="/css/footable.bootstrap.css" rel="stylesheet">
		@stop
		@section('page-js-files')
			<script src="/js/footable.min.js"></script>
		@stop

		@section('page-js-script')
			<script type="text/javascript">
				var j = jQuery.noConflict();
				jQuery(function(j){
					j('.table').footable({
						"filtering": {
							"enabled": true
						}
					});
				});
			</script>
			<script type="text/javascript">
				function showVideo(){
				    document.getElementById("personalizado").style.display="none";   
				    document.getElementById("videos").style.display="inline";
				}
				function showPersonalizate(){
				    document.getElementById("videos").style.display="none";
				    document.getElementById("personalizado").style.display="inline";
				}
				
			</script>
		@stop
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
