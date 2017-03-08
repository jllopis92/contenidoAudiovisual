@if (!Auth::guest())
	@if ((Auth::user()->tipo == "profesor") || (Auth::user()->tipo == "administrador"))
	@extends('layouts.controlPanel')
	@section('content')
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
	@endsection

	@section('page-style-files')
		<link href="/css/footable.bootstrap.css" rel="stylesheet">
	@stop

	@section('page-js-files')
		<script src="/js/footable.min.js"></script>
		 {{--  <script src="{!!url('../js/jquery.min.js')!!}"></script> --}}
	@stop

	@section('page-js-script')
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