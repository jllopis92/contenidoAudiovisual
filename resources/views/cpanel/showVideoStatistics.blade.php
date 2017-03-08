 $seenBy = DB::table('seenBy')->get();
        $users = DB::table('users')->get();
        $movies = DB::table('movies')->get();


@if (!Auth::guest())
	@if ((Auth::user()->tipo == "profesor") || (Auth::user()->tipo == "administrador"))
	@extends('layouts.controlPanel')
	@section('content')
		<div id = "aprove" class="col-md-12">
			@if (count($aproves) === 0)
			<h5 style="margin-top: 30px;">No se encuentran videos aprobados</h5>
			@elseif (count($aproves) >= 1)
				<h4 style="margin-top: 30px;">Seleccione Video</h4>
				<table class="table" data-filtering="true" data-paging="true" data-sorting="true">
					<thead>
						<th class="blackText">Nombre</th>
						<th class="blackText">Reproducciones</th>
						<th class="blackText" data-type="html">Acción</th>
					</thead>
					<tbody>
						@foreach($movies as $movie)
							<tr>
								<td>
									<h4>{{$movie->name}}</h4>
									<img src="files/{{$movie->imageRef}}" title="allbum-name" style="width: 220px; height: 220px;"/>
								</td>
								<td>
									<h4>{{$movie->visit}}</h4>
								</td>
								<td data-toggle="modal" data-target="#aproveModal" data-name="{!! $movie->name!!}" data-state="{!!$movie->state!!}" data-id="{!!$movie->id!!}" class="openform">
									<button type="button" class="btn btn-primary orangeButton">Ver Detalle</button>
								</td>
							</tr>
						@endforeach
					</tbody>
				</table>
				@endif
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
		var j = jQuery.noConflict();
		jQuery(function(j){
			j('.table').footable({
				"filtering": {
					"enabled": true
				}
			});
		});
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
