

@if (!Auth::guest())
	@if ((Auth::user()->tipo == "profesor") || (Auth::user()->tipo == "administrador"))
	@extends('layouts.controlPanel')
	@section('content')

		<script type="text/javascript">
			var states = [
			'Aprobar',
			'Reprobar',
			'En Observación'];

			var statesIds = [1, 0, 2];

			function setSubmits (){

			    var select = document.getElementById('state');
			    var newstate = document.getElementById('nowState').value;
				for (var i = 0; i < statesIds.length; i++){
					var opt = document.createElement('option');
				    opt.value = statesIds[i];
				    opt.innerHTML = states[i];
				    select.appendChild(opt);
				}
			}
		</script>
  
		<h3 class="orangeAndBoldText" style="margin-bottom: 30px; margin-left: 30px;"">Evaluar Videos</h3>
		<label class=" col-md-12"> Selecione estado: </label>
		<div class="radio col-md-12" style="margin-left: 30px;"">
			<label class="radio-inline col-xs-12 col-sm-3" style="
			    margin-left: 0px;
			    padding-right: 0px;
			    padding-left: 0px;
			    padding-bottom: 5px;
			">
			<input type="radio" name="aorb" onClick="showAprove()" checked="checked"> Videos Aprobados</label> 
			<label class="radio-inline col-xs-12 col-sm-3" style="
			    margin-left: 0px;
			    padding-right: 0px;
			    padding-left: 0px;
			    padding-bottom: 5px;
			">
			<input type="radio" name="aorb" onClick="showObs()"> Videos En Observación</label>
			<label class="radio-inline col-xs-12 col-sm-3" style="
			    margin-left: 0px;
			    padding-right: 0px;
			    padding-left: 0px;
			    padding-bottom: 5px;
			">
			<input type="radio" name="aorb" onClick="showReprove()"> Videos Reprobados</label>
			<label class="radio-inline col-xs-12 col-sm-3" style="
			    margin-left: 0px;
			    padding-right: 0px;
			    padding-left: 0px;
			    padding-bottom: 5px;
			">
			<input type="radio" name="aorb" onClick="showWaitAprove()" > Videos en Espera</label>
		</div>
		<div>
			<div id = "aprove" class="col-md-12">
			@if (count($aproves) === 0)
			<h5 style="margin-top: 30px;">No se encuentran videos aprobados</h5>
			@elseif (count($aproves) >= 1)
				<h4 style="margin-top: 30px;">Videos Aprobados</h4>
				<table class="table" data-filtering="true" data-paging="true" data-sorting="true">
					<thead>
						<th class="blackText">Nombre</th>
						<th class="blackText">Subido Por</th>
						<th class="blackText">Descripción</th>
						<th class="blackText" data-type="html">Acción</th>
					</thead>
					<tbody>
						@foreach($aproves as $aprove)
							<tr>
								<td>
									<h4>{{$aprove->name}}</h4>
									<img src="files/{{$aprove->imageRef}}" title="allbum-name" style="width: 220px; height: 220px;"/>
								</td>
								<td>
									@foreach($users as $user)
										@if ($aprove->usuario_id == $user->id)
									         {{$user->name}}
							            @endif
							        @endforeach
								</td>
								<td>
									{{$aprove->description}}
								</td>
								<td data-toggle="modal" data-target="#aproveModal" data-name="{!! $aprove->name!!}" data-state="{!!$aprove->state!!}" data-id="{!!$aprove->id!!}" class="openform">
									<button type="button" class="btn btn-primary orangeButton">Evaluar</button>
								</td>
							</tr>
						@endforeach
					</tbody>
				</table>
				@endif
			</div>

			<div id = "observe" class="col-md-12" style="display: none;">
				@if (count($observations) === 0)
				<h5 style="margin-top: 30px;">No se encuentran videos en observación</h5>
				@elseif (count($observations) >= 1)
					<h4 style="margin-top: 30px;">Videos en Observación</h4>

					<table class="table" data-filtering="true" data-paging="true" data-sorting="true">
						<thead>
							<th class="blackText">Nombre</th>
							<th class="blackText">Subido Por</th>
							<th class="blackText">Descripción</th>
							<th class="blackText" data-type="html">Acción</th>
						</thead>
						<tbody>
							@foreach($observations as $observation)
								<tr>
								<td>
									<h4>{{$observation->name}}</h4>
									<img src="files/{{$observation->imageRef}}" title="allbum-name" style="width: 220px; height: 220px;"/>
								</td>
								<td>
									@foreach($users as $user)
										@if ($observation->usuario_id == $user->id)
									         {{$user->name}}
							            @endif
							        @endforeach
								</td>
								<td>
									{{$observation->description}}
								</td>
								<td data-toggle="modal" data-target="#aproveModal" data-name="{!! $observation->name!!}" data-state="{!!$observation->state!!}" data-id="{!!$observation->id!!}" class="openform">
									<button type="button" class="btn btn-primary orangeButton">Evaluar</button>
								</td>
								</tr>
							@endforeach
						</tbody>
					</table>
				@endif
			</div>

			<div id = "reproveMovies" class="col-md-12" style="display: none;">
				@if (count($reproves) === 0)
				<h5 style="margin-top: 30px;">No se encuentran videos reprobados</h5>
				@elseif (count($reproves) >= 1)
					<h4 style="margin-top: 30px;">Videos Reprobados</h4>

					<table class="table" data-filtering="true" data-paging="true" data-sorting="true">
						<thead>
							<th class="blackText">Nombre</th>
							<th class="blackText">Subido Por</th>
							<th class="blackText">Descripción</th>
							<th class="blackText" data-type="html">Acción</th>
						</thead>
						<tbody>
							@foreach($reproves as $reprove)
								<tr>
								<td>
									<h4>{{$reprove->name}}</h4>
									<img src="files/{{$reprove->imageRef}}" title="allbum-name" style="width: 220px; height: 220px;"/>
								</td>
								<td>
									@foreach($users as $user)
										@if ($reprove->usuario_id == $user->id)
									         {{$user->name}}
							            @endif
							        @endforeach
								</td>
								<td>
									{{$reprove->description}}
								</td>
								<td data-toggle="modal" data-target="#aproveModal" data-name="{!! $reprove->name!!}" data-state="{!!$reprove->state!!}" data-id="{!!$reprove->id!!}" class="openform">
									<button type="button" class="btn btn-primary orangeButton">Evaluar</button>
								</td>
								</tr>
							@endforeach
						</tbody>
					</table>
				@endif
			</div>

			<div id = "waitAprove" class="col-md-12" style="display: none;">
				@if (count($waits) === 0)
				<h5 style="margin-top: 30px;">No se encuentran videos en espera de aprobación</h5>
				@elseif (count($waits) >= 1)
					<h4 style="margin-top: 30px;">Videos en Espera de aprobación</h4>

					<table class="table" data-filtering="true" data-paging="true" data-sorting="true">
						<thead>
							<th class="blackText">Nombre</th>
							<th class="blackText">Subido Por</th>
							<th class="blackText">Descripción</th>
							<th class="blackText" data-type="html">Acción</th>
						</thead>
						<tbody>
							@foreach($waits as $wait)
								<tr>
								<td>
									<h4>{{$wait->name}}</h4>
									<img src="files/{{$wait->imageRef}}" title="allbum-name" style="width: 220px; height: 220px;"/>
								</td>
								<td>
									@foreach($users as $user)
										@if ($wait->usuario_id == $user->id)
									         {{$user->name}}
							            @endif
							        @endforeach
								</td>
								<td>
									{{$wait->description}}
								</td>
								<td data-toggle="modal" data-target="#aproveModal" data-name="{!! $wait->name!!}" data-state="{!!$wait->state!!}" data-id="{!!$wait->id!!}" class="openform">
									<button type="button" class="btn btn-primary orangeButton">Evaluar</button>
								</td>
								</tr>
							@endforeach
						</tbody>
					</table>
				@endif
			</div>
			{{-- <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Open Modal</button> --}}

			<!-- Modal -->
			<div class="modal fade" id="aproveModal" role="dialog">
			    <div class="modal-dialog" style="height: 70%; background-color: white;">
			    
			      <!-- Modal content-->
			      	<div class="modal-content">
				        {{-- <div class="modal-header">
				          	<button type="button" class="close" data-dismiss="modal">&times;</button>
				         	<h4 id="movieTittle" class="modal-title"></h4>
				        </div> --}}
			        	{!! Form::open(['url' =>'approve', 'method'=>'POST']) !!}
			        	<div class="modal-body" style="padding-top: 0px; padding-bottom: 0px;">
			        		<div class="form-group col-md-12" style="margin-top: 20px;">
	                        	<button type="button" class="close" data-dismiss="modal">&times;</button>
				         		<h4 id="movieTittle" class="modal-title"></h4>
	                        </div>
	                        <div class="form-group col-md-12" style="display: none;">
	                        	<label class="col-md-6"> ID: </label>
	                            <input class="col-md-6" type="text" name="id" id="id" value=""/>
	                        </div>
	                        <div class="form-group col-md-12" style="display: none;">
	                            <input class="col-md-6" type="text" name="nowState" id="nowState" value=""/>
	                        </div>
							<div class="form-group col-md-12" style="padding-top: 15px;">
	                            <label for="state" class="col-md-8 control-label">Seleccione Nuevo estado:</label>
	                            <div class="col-md-4">
	                                <select class="form-control" size="1" id="state" name="state">
	                                    <option value="">ESTADO</option>
	                                </select>
	                            </div>
	                            <div class="alert alert-danger col-md-12 col-xs-12" id="stateValidation" style="display: none;
	                            margin-top: 10px;">
	                            </div>
	                        </div>

	                        <div class = "form-group col-md-12" id = "commentary">
								{!! Form::label('observation', '¿Porque desea cambiar el estado del video?') !!}
					    		{!! Form::textarea('observation', null, ['class'=> 'form-control', 'required'=> '']) !!}
					    		<div class="alert alert-danger col-md-12 col-xs-12" id="commentaryValidation" style="display: none;
	                            margin-top: 10px;">
	                            </div>
					    		{!! Form::submit('Enviar Comentario',['class' =>'btn btn-primary disabled sendButton orangeButton', 'value' =>'validate']) !!}
				    		</div>
			        	</div>
			        	{!! Form::close() !!}
			      	</div>
			    </div>
			</div>
			
		</div>
		@endsection

		@section('page-style-files')
			<link href="/css/footable.bootstrap.css" rel="stylesheet">
		@stop

		@section('page-js-files')
			<script src="/js/footable.min.js"></script>
		 {{--  <script src="{!!url('../js/jquery.min.js')!!}"></script> --}}
		@stop

		@section('page-js-script')
			<script type="text/javascript">
				function showAprove(){
				    document.getElementById("reproveMovies").style.display="none";
				    document.getElementById("waitAprove").style.display="none";
				    document.getElementById("observe").style.display="none";   
				    document.getElementById("aprove").style.display="inline";
				}
				function showObs(){
				    document.getElementById("aprove").style.display="none";
				    document.getElementById("reproveMovies").style.display="none";
				    document.getElementById("waitAprove").style.display="none";
				    document.getElementById("observe").style.display="inline";
				}
				function showReprove(){
				    document.getElementById("aprove").style.display="none";
				    document.getElementById("waitAprove").style.display="none";
				    document.getElementById("observe").style.display="none";
				    document.getElementById("reproveMovies").style.display="inline";
				}
				function showWaitAprove(){
				    document.getElementById("aprove").style.display="none";
				    document.getElementById("reproveMovies").style.display="none";
				    document.getElementById("observe").style.display="none";
				    document.getElementById("waitAprove").style.display="inline";
				}
				/*function showCommentary(id, status) {
				    var actual = document.getElementById("commentary_"+id);
				    if (actual.style.display === 'none') {
				        actual.style.display = 'block';
				    } else {
				        actual.style.display = 'none';
				        document.getElementById("description").value = "";
				    }
				    document.getElementById("state_"+id).value = status;
				    //alert(id + "change status to : " + status);
				}*/
			</script>
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
				     //alert("name: "+ name);
				    var thisState = j(this).data('state');
				    j(".modal-body #id").val(id);
				    j(".modal-body #nowState").val(thisState);
/*
				    var state = document.getElementById('nowState').value;
				    alert(state);*/
				  
                    document.getElementById("movieTittle").innerHTML = name;
                    setSubmits();
				});

				j('#aproveModal').on('hidden.bs.modal', function () {
					j("#state").empty();
				    /*var select = document.getElementById("state");
					var length = select.options.length;
					for (i = 0; i < length; i++) {
						alert("Borra: "+ select.options[i].val());
					  	select.options[i] = null;
					}*/
				})
			</script>
			<script type="text/javascript">
				var j = jQuery.noConflict();

	            var validState = 0;
	            var validObservation = 1;


	            j('#observation').on('input',function(e){
	                checkObservation();
	            });
	            j('#state').change(function() {
	              checkState();
	            });

	            function checkObservation(){
	                var observation = j('#observation').val();
	                var BLIDRegExpression = /^[a-zA-Z0-9\ \Ñ\ñ\,\.\:\;\u00C0-\u017F\-\_\?\¿\!\(\)\[\]]+$/;
	                if(observation.length == 0){
	                    document.getElementById("commentaryValidation").style.display = "inline";
	                    document.getElementById("commentaryValidation").innerHTML = 'Campo Obligatorio';
	                    validObservation = 0;
	                }else if (!BLIDRegExpression.test(observation)) {
	                    document.getElementById("commentaryValidation").style.display = "inline";
	                    document.getElementById("commentaryValidation").innerHTML = 'El Campo Contiene Caracteres Invalidos';
	                    validObservation = 0;
	                }else{
	                    document.getElementById("commentaryValidation").style.display = "none";
	                    validObservation = 1;
	                }
	                checkForm();
	            }

	            function checkState(){
	                var state = j('#state').val();
	                if(state == ""){
	                    document.getElementById("stateValidation").style.display = "inline";
	                    document.getElementById("stateValidation").innerHTML = 'Campo Obligatorio';
	                    validState = 0;
	                    checkForm();
	                }else{
	                    document.getElementById("stateValidation").style.display = "none";
	                    validState = 1;
	                    checkForm();
	                }
	                checkForm();
	            }

				function checkForm() {
	                if(validState == 0 || validObservation == 0){
	                    j(".sendButton").attr('class', 'btn btn-primary disabled sendButton orangeButton');
	                }
	                if(validState == 1 && validObservation == 1){
	                    j(".sendButton").attr('class', 'btn btn-primary active sendButton orangeButton');
	                }
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
