

@if (!Auth::guest())
	@if ((Auth::user()->tipo == "profesor") || (Auth::user()->tipo == "administrador"))
	@extends('layouts.panelprofesor')
	@section('content')
		<style>
		.form-control {
		    width: 100%;
		}
		</style>
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
			function showCommentary(id, status) {
			    var actual = document.getElementById("commentary_"+id);
			    if (actual.style.display === 'none') {
			        actual.style.display = 'block';
			    } else {
			        actual.style.display = 'none';
			        document.getElementById("description").value = "";
			    }
			    document.getElementById("state_"+id).value = status;
			    alert(id + "change status to : " + status);
			}
		</script>
		  
		 <h3 class="orangeAndBoldText" style="margin-bottom: 30px;">Evaluar Videos</h3>
		 <label> Selecione estado: </label>
		<div class="radio">
			<label class="radio-inline"><input type="radio" name="aorb" onClick="showAprove()" checked="checked"> Videos Aprobados</label> 
			<label class="radio-inline"><input type="radio" name="aorb" onClick="showObs()"> Videos En Observación</label>
			<label class="radio-inline"><input type="radio" name="aorb" onClick="showReprove()"> Videos Reprobados</label>
			<label class="radio-inline"><input type="radio" name="aorb" onClick="showWaitAprove()" > Videos en Espera de Aprobación</label>
			</div>
		<div>
			<div id = "aprove">
			@if (count($aproves) === 0)
			<h5 style="margin-top: 30px;">No se encuentran videos aprobados</h5>
			@elseif (count($aproves) >= 1)
				<h4 style="margin-top: 30px;">Videos Aprobados</h4>
				<table class="table">
					@foreach($aproves as $aprove)
					<tbody>
						<tr>
						<td>
							<h4>{{$aprove->name}}</h4>
							<img src="files/{{$aprove->imageRef}}" title="allbum-name" style="width: 220px; height: 220px;"/>
						</td>
						<td style="vertical-align: middle;">
							@foreach($users as $user)
								@if ($aprove->usuario_id == $user->id)
									@if ($aprove->state == 1)
									<p>Estado: Aprobado</p>
									@elseif ($aprove->state == 0)
									<p>Estado: Reprobado</p>
									@elseif ($aprove->state == 2)
									<p>Estado: En Observación</p>
									@endif
									<p>Fecha: {{ date('d-m-y', strtotime($aprove->created_at)) }}</p>
						            <p>Subido por: {{$user->name}}</p>
						            <p>Descripción: {{$aprove->description}}</p>
					            @endif
					        @endforeach
						</td>
						<td style="vertical-align: middle;">
							<div class = "form-group">
							   <button type="button" id="in-obs" class="btn btn-warning" onClick="showCommentary({{$aprove->id}}, 2)" >En Observación</button>
							</div>
							<div class = "form-group">
							<button type="button" id="reprove" class="btn btn-danger" onClick="showCommentary({{$aprove->id}}, 0)" >Reprobar</button>
							</div>
						</td>
						</tr>
						<tr>
							<td colspan="3" style ="border-top: 1px solid #ffffff;">
								{!! Form::open(['url' =>'approve', 'method'=>'POST']) !!}
								<div class = "form-group" style ="display: none;">
									<input id="video_id" type="text" class="form-control" name="video_id" value="{{ $aprove->id }}">
								</div>
								<div class = "form-group" style ="display: none;">
								<input id="state_{{$aprove->id}}" type="text" class="form-control" name="state_{{$aprove->id}}" value="">
								</div>
								<div class = "form-group" id = "commentary_{{$aprove->id}}" style ="display: none;">
										{!! Form::label('observation', 'Descripción:') !!}
				    					{!! Form::textarea('observation', null, ['class'=> 'form-control', 'required'=> '']) !!}
				    					{!! Form::submit('Enviar Comentario',['class' =>'btn btn-primary', 'value' =>'validate']) !!}
			    				</div>
			    				{!! Form::close() !!}
							</td>
						</tr>
					</tbody>
					@endforeach
				</table>
				{!!$aproves->render()!!}
				@endif
			</div>

			<div id = "observe" style="display: none;">
				@if (count($observations) === 0)
				<h5 style="margin-top: 30px;">No se encuentran videos en observación</h5>
				@elseif (count($observations) >= 1)
					<h4 style="margin-top: 30px;">Videos en Observación</h4>
					<table class="table">
						@foreach($observations as $observation)
						<tbody>
						<tr>
							<td>
								<h4>{{$observation->name}}</h4>
								<img src="files/{{$observation->imageRef}}" title="allbum-name" style="width: 220px; height: 220px;"/>
							</td>
							<td style="vertical-align: middle;">
								@foreach($users as $user)
									@if ($observation->usuario_id == $user->id)
										<p>Estado: En Observación</p>
										<p>Fecha: {{ date('d-m-y', strtotime($observation->created_at)) }}</p>
							            <p>Subido por: {{$user->name}}</p>
							            <p>Descripción: {{$observation->description}}</p>
						            @endif
						        @endforeach
							</td>
							<td style="vertical-align: middle;">
								{!! Form::open(['url' =>'approve', 'method'=>'POST']) !!}

								<div class = "form-group" style ="display: none;">
								    {!! Form::label('video_id', 'video_id:') !!}
								    {!! Form::text('video_id', $observation->id) !!}
								</div>
								<div class = "form-group" style ="display: none;">
								    {!! Form::label('state', 'State:') !!}
								    {!! Form::text('state', 1) !!}
								</div>
								<div class = "form-group">
									{!! Form::submit('Aprobar',['class' =>'btn btn-primary']) !!}
						    		{!! Form::close() !!}
					    		</div>
								<div class = "form-group">
									<button type="button" id="reprove" class="btn btn-danger" onClick="showCommentary({{$observation->id}}, 0)" >Reprobar</button>
								</div>
							</td>
							</tr>
						<tr>
							<td colspan="3" style ="border-top: 1px solid #ffffff;">
							{!! Form::open(['url' =>'approve', 'method'=>'POST']) !!}
								<div class = "form-group" style ="display: none;">
									<input id="video_id" type="text" class="form-control" name="video_id" value="{{ $observation->id }}">
								</div>
								<div class = "form-group" style ="display: none;">
								<input id="state_{{$observation->id}}" type="text" class="form-control" name="state_{{$observation->id}}" value="">
								</div>
								<div class = "form-group" id = "commentary_{{$observation->id}}" style ="display: none;">
										{!! Form::label('observation', 'Descripción:') !!}
				    					{!! Form::textarea('observation', null, ['class'=> 'form-control', 'required'=> '']) !!}
				    					{!! Form::submit('Enviar Comentario',['class' =>'btn btn-primary', 'value' =>'validate']) !!}
				    				{!! Form::close() !!}
			    				</div>
							</td>
						</tr>
						</tbody>
						@endforeach
					</table>

					{!!$observations->render()!!}
				@endif
			</div>

			<div id = "reproveMovies" style="display: none;">
				@if (count($reproves) === 0)
				<h5 style="margin-top: 30px;">No se encuentran videos reprobados</h5>
				@elseif (count($reproves) >= 1)
					<h4 style="margin-top: 30px;">Videos Reprobados</h4>
					<table class="table">
						@foreach($reproves as $reprove)
						<tbody>
						<tr>
							<td>
								<h4>{{$reprove->name}}</h4>
								<img src="files/{{$reprove->imageRef}}" title="allbum-name" style="width: 220px; height: 220px;"/>
							</td>
							<td style="vertical-align: middle;">
								@foreach($users as $user)
									@if ($reprove->usuario_id == $user->id)
										<p>Estado: Reprobado</p>
										<p>Fecha: {{ date('d-m-y', strtotime($reprove->created_at)) }}</p>
							            <p>Subido por: {{$user->name}}</p>
							            <p>Descripción: {{$reprove->description}}</p>
						            @endif
						        @endforeach
							</td>
							<td style="vertical-align: middle;">
								{!! Form::open(['url' =>'approve', 'method'=>'POST']) !!}

								<div class = "form-group" style ="display: none;">
								    {!! Form::label('video_id', 'video_id:') !!}
								    {!! Form::text('video_id', $reprove->id) !!}
								</div>
								<div class = "form-group" style ="display: none;">
								    {!! Form::label('state', 'State:') !!}
								    {!! Form::text('state', 1) !!}
								</div>
								<div class = "form-group">
								{!! Form::submit('Aprobar',['class' =>'btn btn-primary']) !!}
					    		{!! Form::close() !!}
					    		</div>
								<div class = "form-group">
								   <button type="button" id="in-obs" class="btn btn-warning" onClick="showCommentary({{$reprove->id}}, 2)" >En Observación</button>
								</div>
							</td>
							</tr>
							<tr>
								<td colspan="3" style ="border-top: 1px solid #ffffff;">
								{!! Form::open(['url' =>'approve', 'method'=>'POST']) !!}
									<div class = "form-group" style ="display: none;">
										<input id="video_id" type="text" class="form-control" name="video_id" value="{{ $reprove->id }}">
									</div>
									<div class = "form-group" style ="display: none;">
									<input id="state_{{$reprove->id}}" type="text" class="form-control" name="state_{{$reprove->id}}" value="">
									</div>
									<div class = "form-group" id = "commentary_{{$reprove->id}}" style ="display: none;">
											{!! Form::label('observation', 'Descripción:') !!}
					    					{!! Form::textarea('observation', null, ['class'=> 'form-control', 'required'=> '']) !!}
					    					{!! Form::submit('Enviar Comentario',['class' =>'btn btn-primary', 'value' =>'validate']) !!}
					    				{!! Form::close() !!}
				    				</div>
								</td>
							</tr>
						</tbody>
						@endforeach
					</table>
					{!!$reproves->render()!!}
				@endif
			</div>

			<div id = "waitAprove" style="display: none;">
				@if (count($waits) === 0)
				<h5 style="margin-top: 30px;">No se encuentran videos en espera de aprobación</h5>
				@elseif (count($waits) >= 1)
					<h4 style="margin-top: 30px;">Videos en Espera de aprobación</h4>
					<table class="table">
						@foreach($waits as $wait)
						<tbody>
						<tr>
							<td>
								<h4>{{$wait->name}}</h4>
								<img src="files/{{$wait->imageRef}}" title="allbum-name" style="width: 220px; height: 220px;"/>
							</td>
							<td style="vertical-align: middle;">
								@foreach($users as $user)
									@if ($wait->usuario_id == $user->id)
										<p>Estado: En Espera de Aprobación</p>
										<p>Fecha: {{ date('d-m-y', strtotime($wait->created_at)) }}</p>
							            <p>Subido por: {{$user->name}}</p>
							            <p>Descripción: {{$wait->description}}</p>
						            @endif
						        @endforeach
							</td>
							<td style="vertical-align: middle;">
								{!! Form::open(['url' =>'approve', 'method'=>'POST']) !!}

								<div class = "form-group" style ="display: none;">
								    {!! Form::label('video_id', 'video_id:') !!}
								    {!! Form::text('video_id', $wait->id) !!}
								</div>
								<div class = "form-group" style ="display: none;">
								    {!! Form::label('state', 'State:') !!}
								    {!! Form::text('state', 1) !!}
								</div>
								<div class = "form-group">
									{!! Form::submit('Aprobar',['class' =>'btn btn-primary']) !!}
						    		{!! Form::close() !!}
					    		</div>
					    		<div class = "form-group">
									<button type="button" id="in-obs" class="btn btn-warning" onClick="showCommentary({{$wait->id}}, 2)" >En Observación</button>
								</div>
								<div class = "form-group">
								<button type="button" id="reprove" class="btn btn-danger" onClick="showCommentary({{$wait->id}}, 0)" >Reprobar</button>
								</div>
							</td>
							</tr>
							<tr>
								<td colspan="3" style ="border-top: 1px solid #ffffff;">
								{!! Form::open(['url' =>'approve', 'method'=>'POST']) !!}
									<div class = "form-group" style ="display: none;">
										<input id="video_id" type="text" class="form-control" name="video_id" value="{{ $wait->id }}">
									</div>
									<div class = "form-group" style ="display: none;">
									<input id="state_{{$wait->id}}" type="text" class="form-control" name="state_{{$wait->id}}" value="">
									</div>
									<div class = "form-group" id = "commentary_{{$wait->id}}" style ="display: none;">
											{!! Form::label('observation', 'Descripción:') !!}
					    					{!! Form::textarea('observation', null, ['class'=> 'form-control', 'required'=> '']) !!}
					    					{!! Form::submit('Enviar Comentario',['class' =>'btn btn-primary', 'value' =>'validate']) !!}
					    				{!! Form::close() !!}
				    				</div>
								</td>
							</tr>
						</tbody>
						@endforeach
					</table>

					{!!$waits->render()!!}
				@endif
			</div>
		</div>
		@endsection

		@section('page-style-files')

		@stop

		@section('page-js-files')
		  <script src="{!!url('../js/jquery.min.js')!!}"></script>
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
