@if (!Auth::guest())
	@if ((Auth::user()->tipo == "profesor") || (Auth::user()->tipo == "administrador"))
		@extends('layouts.controlPanel')
		@section('content')
			<div id = "aprove" class="col-md-10 col-offset-1">
					<h4 style="margin-top: 30px;">Videos Con Reproducciones</h4>
					<table class="table" data-filtering="true" data-paging="true" data-sorting="true">
						<thead>
							<th class="blackText" data-type="html">Nombre</th>
							<th class="blackText" data-type="html">Visto Por</th>
							<th class="blackText" data-type="html">Fecha</th>
						</thead>
						<tbody>
							@foreach($seensBy as $seenBy)
								<tr>
									<td>
										@foreach($movies as $movie)
											@if ($seenBy->movie_id == $movie->id)
												{{$movie->name}}
												{{-- {!! link_to_route('seenby.edit', $title = $movie->name, $parameters = $movie->id)!!} --}}
								            @endif
								        @endforeach
									</td>
									<td>
										@foreach($users as $user)
											@if ($seenBy->user_id == $user->id)
												{{$user->name}}
												{{-- {!! link_to_route('upload.edit', $title = $user->name, $parameters = $user->id)!!} --}}
								            @endif
								        @endforeach
									</td>
									<td>
										{{$seenBy->created_at}}
									</td>
								</tr>
							@endforeach
						</tbody>
					</table>
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