@extends('layouts.controlPanel')

@section('content')
	<h3 class="orangeAndBoldText" style="margin-bottom: 30px; padding-left: 20px;">Ver Anuncios</h3>
	<div style="padding-left: 20px; padding-right: 20px;">
		<table class="table" data-filtering="true" data-paging="true" data-sorting="true">
			<thead>
				<th>Enviado Por</th>
				<th>Motivo</th>
				<th>Video</th>
				<th data-type="html"> </th>
			</thead>
			<tbody>
				@foreach($notifications as $notification)
					@if(Auth::user()->id == $notification->send_to)
						<tr>
							<td>
								@foreach($users as $user)
									@if($user->id == $notification->user_id)
										{{$user->name}}
									@endif
								@endforeach
							</td>
							<td>{{$notification->reason}}</td>
							<td>
								@foreach($movies as $movie)
									@if($movie->id == $notification->movie_id)
										{{$movie->name}}
									@endif
								@endforeach
							</td>
						</tr>
					@endif
				@endforeach
			</tbody>
		</table>
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
@stop