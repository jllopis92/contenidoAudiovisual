@extends('layouts.panelprofesor')
@section('content')
	@if (!Auth::guest())
		@if ((Auth::user()->tipo == "profesor") || (Auth::user()->tipo == "administrador"))
			<h3 style="margin-bottom: 30px;">Administrar Test</h3>
			<table class="table">
				<thead>
					<th>Nombre</th>
					<th>URL</th>
					
				</thead>
				@foreach($tests as $test)
					<tbody>
						<td>{{$test->name}}</td>
						<td>{{$test->url}}</td>
					</tbody>
				@endforeach
			</table>
			{!!$tests->render()!!}
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
@endsection