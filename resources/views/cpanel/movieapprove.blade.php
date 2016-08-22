@extends('layouts.panelprofesor')
@section('content')
<!-- bower-->
{{-- {{ Html::style('assets/vendor/video.js/dist/video-js.min.css') }}
{{ Html::style('assets/vendor/libjass/libjass.css') }}

{{ Html::script('assets/vendor/video.js/dist/video.min.js') }}
{{ Html::script('assets/vendor/libjass/libjass.js') }} --}}

<script type="text/javascript">
	function showWaitAprove(){
	    document.getElementById("aprove").style.display="none";
	    document.getElementById("reprove").style.display="none";
	    document.getElementById("observe").style.display="none";
	    document.getElementById("waitAprove").style.display="inline";
	}
	function showAprove(){
	    document.getElementById("reprove").style.display="none";
	    document.getElementById("waitAprove").style.display="none";
	    document.getElementById("observe").style.display="none";   
	    document.getElementById("aprove").style.display="inline";
	}
	function showObs(){
	    document.getElementById("aprove").style.display="none";
	    document.getElementById("reprove").style.display="none";
	    document.getElementById("waitAprove").style.display="none";
	    document.getElementById("observe").style.display="inline";
	}
	function showReprove(){
	    document.getElementById("aprove").style.display="none";
	    document.getElementById("waitAprove").style.display="none";
	    document.getElementById("observe").style.display="none";
	    document.getElementById("reprove").style.display="inline";
	}
</script>

<div class="radiobox">
	<input type="radio"  name="aorb" onClick="showWaitAprove()" > Videos En Espera de Aprobación
	<input type="radio"  name="aorb" onClick="showAprove()"> Videos Aprobados 
	<input type="radio"  name="aorb" onClick="showObs()"> Videos En Observación 
	<input type="radio"  name="aorb" onClick="showReprove()"> Videos Reprobados 
	</div>
<div>
	<div id = "aprove">
	@if (count($aproves) === 0)
	No se encuentran videos aprobados
	@elseif (count($aproves) >= 1)
		<h3>Videos Aprobados</h3>
		<table class="table">
			@foreach($aproves as $aprove)
			<tbody>
				<td>
					<h4>{{$aprove->name}}</h4>
					<img src="files/{{$aprove->imageRef}}" title="allbum-name" style="width: 220px; height: 220px;"/>
					{{-- <video id={{$aprove->id}} class="video-js vjs-default-skin vjs-big-play-centered" style="width: 260px; height: 220px;">
				    <source src="/files/convert/{{$aprove->url}}" type="video/mp4">
					<source src="/files/convert/{{$aprove->url}}" type='video/webm'>
					<source src="/files/convert/{{$aprove->url}}" type='video/ogg'>
				    </video>
				    <script>
				      videojs('{{$aprove->id}}', {
				        controls: true,
				        nativeControlsForTouch: false,
				        width: 640,
				        height: 360,
				        plugins: {
				          ass: {
				            'src': ["/files/subs/Warcraft 2016 HDTC x264 AC3 TiTAN-fondonegro.ssa"]
				          }
				        },
				        playbackRates: [0.5, 1, 1.5, 2]
				      });
				    </script> --}}

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
					{!! Form::open(['url' =>'approve', 'method'=>'POST']) !!}

					<div class = "form-group" style ="display: none;">
					    {!! Form::label('video_id', 'video_id:') !!}
					    {!! Form::text('video_id', $aprove->id) !!}
					</div>
					<div class = "form-group" style ="display: none;">
					    {!! Form::label('state', 'State:') !!}
					    {!! Form::text('state', 2) !!}
					</div>
					{!! Form::submit('En Observación',['class' =>'btn btn-warning']) !!}
		    		{!! Form::close() !!}

					{!! Form::open(['url' =>'approve', 'method'=>'POST']) !!}

					<div class = "form-group" style ="display: none;">
					    {!! Form::label('video_id', 'video_id:') !!}
					    {!! Form::text('video_id', $aprove->id) !!}
					</div>
					<div class = "form-group" style ="display: none;">
					    {!! Form::label('state', 'State:') !!}
					    {!! Form::text('state', 0) !!}
					</div>
					{!! Form::submit('Reprobar',['class' =>'btn btn-danger']) !!}
		    		{!! Form::close() !!}
				</td>
			</tbody>
			@endforeach
		</table>
		{!!$aproves->render()!!}
		@endif
	</div>

	<div id = "reprove" style="display: none;">
	@if (count($reproves) === 0)
	No se encuentran videos aprobados
	@elseif (count($reproves) >= 1)
		<h3>Aprobar Video</h3>
		<table class="table">
			@foreach($reproves as $reprove)
			<tbody>
				<td>
					<h4>{{$reprove->name}}</h4>
					<img src="files/{{$reprove->imageRef}}" title="allbum-name" style="width: 220px; height: 220px;"/>
					{{-- <video id={{$reprove->id}} class="video-js vjs-default-skin vjs-big-play-centered" style="width: 260px; height: 220px;">
				    <source src="/files/convert/{{$reprove->url}}" type="video/mp4">
					<source src="/files/convert/{{$reprove->url}}" type='video/webm'>
					<source src="/files/convert/{{$reprove->url}}" type='video/ogg'>
				    </video>
				    <script>
				      videojs('{{$reprove->id}}', {
				        controls: true,
				        nativeControlsForTouch: false,
				        width: 640,
				        height: 360,
				        plugins: {
				          ass: {
				            'src': ["/files/subs/Warcraft 2016 HDTC x264 AC3 TiTAN-fondonegro.ssa"]
				          }
				        },
				        playbackRates: [0.5, 1, 1.5, 2]
				      });
				    </script> --}}

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
					{!! Form::submit('Aprobar',['class' =>'btn btn-primary']) !!}
		    		{!! Form::close() !!}

					{!! Form::open(['url' =>'approve', 'method'=>'POST']) !!}

					<div class = "form-group" style ="display: none;">
					    {!! Form::label('video_id', 'video_id:') !!}
					    {!! Form::text('video_id', $reprove->id) !!}
					</div>
					<div class = "form-group" style ="display: none;">
					    {!! Form::label('state', 'State:') !!}
					    {!! Form::text('state', 2) !!}
					</div>
					{!! Form::submit('En Observación',['class' =>'btn btn-warning']) !!}
		    		{!! Form::close() !!}
				</td>
			</tbody>
			@endforeach
		</table>

		{!!$reproves->render()!!}
	@endif
	</div>

	<div id = "waitAprove" style="display: none;">
	@if (count($waits) === 0)
	No se encuentran videos en espera de aprobación
	@elseif (count($waits) >= 1)
		<h3>Videos en Espera de aprobación</h3>
		<table class="table">
			@foreach($waits as $wait)
			<tbody>
				<td>
					<h4>{{$wait->name}}</h4>
					<img src="files/{{$wait->imageRef}}" title="allbum-name" style="width: 220px; height: 220px;"/>
					{{-- <video id={{$reprove->id}} class="video-js vjs-default-skin vjs-big-play-centered" style="width: 260px; height: 220px;">
				    <source src="/files/convert/{{$reprove->url}}" type="video/mp4">
					<source src="/files/convert/{{$reprove->url}}" type='video/webm'>
					<source src="/files/convert/{{$reprove->url}}" type='video/ogg'>
				    </video>
				    <script>
				      videojs('{{$reprove->id}}', {
				        controls: true,
				        nativeControlsForTouch: false,
				        width: 640,
				        height: 360,
				        plugins: {
				          ass: {
				            'src': ["/files/subs/Warcraft 2016 HDTC x264 AC3 TiTAN-fondonegro.ssa"]
				          }
				        },
				        playbackRates: [0.5, 1, 1.5, 2]
				      });
				    </script> --}}

				</td>
				<td style="vertical-align: middle;">
					@foreach($users as $user)
						@if ($wait->usuario_id == $user->id)
							<p>Estado: Reprobado</p>
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
					{!! Form::submit('Aprobar',['class' =>'btn btn-primary']) !!}
		    		{!! Form::close() !!}

					{!! Form::open(['url' =>'approve', 'method'=>'POST']) !!}

					<div class = "form-group" style ="display: none;">
					    {!! Form::label('video_id', 'video_id:') !!}
					    {!! Form::text('video_id', $aprove->id) !!}
					</div>
					<div class = "form-group" style ="display: none;">
					    {!! Form::label('state', 'State:') !!}
					    {!! Form::text('state', 0) !!}
					</div>
					{!! Form::submit('Reprobar',['class' =>'btn btn-danger']) !!}
		    		{!! Form::close() !!}
				</td>
			</tbody>
			@endforeach
		</table>

		{!!$reproves->render()!!}
	@endif
	</div>

	<div id = "observe" style="display: none;">
		@if (count($observations) === 0)
		No se encuentran videos en observación
		@elseif (count($observations) >= 1)
			<h3>Videos en Observación</h3>
			<table class="table">
				@foreach($observations as $observation)
				<tbody>
					<td>
						<h4>{{$observation->name}}</h4>
						<img src="files/{{$observation->imageRef}}" title="allbum-name" style="width: 220px; height: 220px;"/>
						{{-- <video id={{$reprove->id}} class="video-js vjs-default-skin vjs-big-play-centered" style="width: 260px; height: 220px;">
					    <source src="/files/convert/{{$reprove->url}}" type="video/mp4">
						<source src="/files/convert/{{$reprove->url}}" type='video/webm'>
						<source src="/files/convert/{{$reprove->url}}" type='video/ogg'>
					    </video>
					    <script>
					      videojs('{{$reprove->id}}', {
					        controls: true,
					        nativeControlsForTouch: false,
					        width: 640,
					        height: 360,
					        plugins: {
					          ass: {
					            'src': ["/files/subs/Warcraft 2016 HDTC x264 AC3 TiTAN-fondonegro.ssa"]
					          }
					        },
					        playbackRates: [0.5, 1, 1.5, 2]
					      });
					    </script> --}}

					</td>
					<td style="vertical-align: middle;">
						@foreach($users as $user)
							@if ($observation->usuario_id == $user->id)
								<p>Estado: Reprobado</p>
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
						{!! Form::submit('Aprobar',['class' =>'btn btn-primary']) !!}
			    		{!! Form::close() !!}

						{!! Form::open(['url' =>'approve', 'method'=>'POST']) !!}

					<div class = "form-group" style ="display: none;">
					    {!! Form::label('video_id', 'video_id:') !!}
					    {!! Form::text('video_id', $aprove->id) !!}
					</div>
					<div class = "form-group" style ="display: none;">
					    {!! Form::label('state', 'State:') !!}
					    {!! Form::text('state', 0) !!}
					</div>
					{!! Form::submit('Reprobar',['class' =>'btn btn-danger']) !!}
		    		{!! Form::close() !!}
					</td>
				</tbody>
				@endforeach
			</table>

			{!!$reproves->render()!!}
		@endif
	</div>
</div>


@endsection

@section('page-style-files')

@stop

@section('page-js-files')
  <script src="{!!url('../js/jquery.min.js')!!}"></script>
@stop