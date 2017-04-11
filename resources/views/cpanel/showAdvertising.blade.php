@if (!Auth::guest())
	@if ((Auth::user()->tipo == "profesor") || (Auth::user()->tipo == "administrador"))
		@extends('layouts.controlPanel')
		@section('content')
			
			<h3 class="orangeAndBoldText" style="margin-bottom: 30px; padding-left: 20px;">Ver Anuncios</h3>
			<div style="padding-left: 20px; padding-right: 20px;">
				<table class="table" data-filtering="true" data-paging="true" data-sorting="true">
					<thead>
						<th>Imagen Referencial</th>
						<th>Video</th>
						<th>Descripción</th>
						<th>Creada</th>
						<th data-type="html"> </th>
					</thead>
					<tbody>
						@foreach($advertisings as $advertising)
							<tr>
								<td>
									<img src="files/{{$advertising->image}}" title="allbum-name" style="width: 75px; height: 75px;"/>
								</td>
								<td>{{$advertising->name}}</td>
								<td>{{$advertising->description}}</td>
								<td>{{$advertising->created_at}}</td>
								<td data-toggle="modal" data-target="#adverModal" data-name="{!! $advertising->name!!}" data-id="{!!$advertising->id!!}" class="openform">
									<button type="button" class="btn btn-primary orangeButton">Eliminar</button>
								</td>
							</tr>
						@endforeach
					</tbody>
				</table>
			</div>
			<div class="modal fade" id="adverModal" role="dialog">
				<div class="modal-dialog" style="height: 20%; background-color: white;">
					<!-- Modal content-->
					<div class="modal-content">
						{!! Form::open(['url' =>'deleteadvertising', 'method'=>'POST']) !!}
						<div class="modal-body" style="padding-top: 0px; padding-bottom: 0px;">
							<div class="form-group col-md-12" style="margin-top: 20px;">
								<button type="button" class="close" data-dismiss="modal">&times;</button>
								<h4 id="movieTittle" class="modal-title"></h4>
							</div>
							<div class="form-group col-md-12" style="display: none;">
								<label class="col-md-6"> ID: </label>
								<input class="col-md-6" type="text" name="id" id="id" value=""/>
							</div>
							<div class = "form-group col-md-12" id = "commentary" style="margin-top: 10px;">
								{!! Form::submit('Eliminar',['class' =>'btn btn-danger']) !!}
							</div>
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
				var j = jQuery.noConflict();
				j(document).on("click", ".openform", function () {
					var id = j(this).data('id');
					var name = j(this).data('name');
					j(".modal-body #id").val(id);
					document.getElementById("movieTittle").innerHTML = "¿Esta seguro de eliminar el Anuncio " + name + "?";
					//setSubmits();
				});

				j('#adverModal').on('hidden.bs.modal', function () {
					j("#state").empty();
				})
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
