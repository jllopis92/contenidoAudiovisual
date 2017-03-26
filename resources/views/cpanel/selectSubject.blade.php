@extends('layouts.controlPanel')
@section('content')
	@if (!Auth::guest())
		@if (Auth::user()->tipo == "administrador")
			<h3 class="orangeAndBoldText" style="margin-bottom: 30px; padding-left: 15px;">Administrar Asignaturas</h3>
			<div class="col-md-10">
				<table class="table" data-filtering="true" data-paging="true" data-sorting="true">
					<thead>
						<th>Nombre</th>
						<th>Profesor a Cargo</th>
						<th data-type="html"> </th>
					</thead>
					<tbody>
						@foreach($subjects as $subject)
							<tr>
								<td>{{$subject->name}}</td>
								@foreach($users as $user)
									@if($user->id == $subject->profesor_id)
										<td>{{$user->name}}</td>
									@endif
								@endforeach
								<td data-toggle="modal" data-target="#subjectModal" data-name="{!! $subject->name!!}" data-id="{!!$subject->id!!}" class="openform">
									<button type="button" class="btn btn-primary orangeButton">Eliminar</button>
								</td>
							</tr>
						@endforeach
					</tbody>
				</table>
			</div>
			<div class="modal fade" id="subjectModal" role="dialog">
			    <div class="modal-dialog" style="height: 20%; background-color: white;">
			      <!-- Modal content-->
			      	<div class="modal-content">
			        	{!! Form::open(['url' =>'deletesubject', 'method'=>'POST']) !!}
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
			document.getElementById("movieTittle").innerHTML = "¿Esta seguro de eliminar la Asignatura " + name + "?";
		});

		j('#subjectModal').on('hidden.bs.modal', function () {
			j("#state").empty();
		})
	</script>
@stop