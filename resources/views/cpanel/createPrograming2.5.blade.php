<!DOCTYPE html>
<html>
<head>
<meta charset='utf-8' />
<link href='/fullcalendar/css/fullcalendar.css' rel='stylesheet' />
<link href='/fullcalendar/css/fullcalendar.print.css' rel='stylesheet' media='print' />
<script src='/fullcalendar/js/moment.min.js'></script>
<script src='/fullcalendar/js/jquery.min.js'></script>
<script src='/fullcalendar/js/jquery-ui.min.js'></script>
<script src='/fullcalendar/js/fullcalendar.min.js'></script>

{{-- cambiar idioma a español --}}

<style>

	body {
		margin-top: 40px;
		text-align: center;
		font-size: 14px;
		font-family: "Lucida Grande",Helvetica,Arial,Verdana,sans-serif;
	}

	#trash{
		width:32px;
		height:32px;
		float:left;
		padding-bottom: 15px;
		position: relative;
	}
		
	#wrap {
		width: 1100px;
		margin: 0 auto;
	}
		
	#external-events {
		float: left;
		width: 150px;
		padding: 0 10px;
		border: 1px solid #ccc;
		background: #eee;
		text-align: left;
	}
		
	#external-events h4 {
		font-size: 16px;
		margin-top: 0;
		padding-top: 1em;
	}
		
	#external-events .fc-event {
		margin: 10px 0;
		cursor: pointer;
	}
		
	#external-events p {
		margin: 1.5em 0;
		font-size: 11px;
		color: #666;
	}
		
	#external-events p input {
		margin: 0;
		vertical-align: middle;
	}

	#calendar {
		float: right;
		width: 900px;
	}

</style>
</head>
<body>
	<div id='wrap'>

		<div id='external-events'>
			<h4>Seleccionar Video</h4>
			@foreach($movies as $movie)
			<div class='fc-event'>{{$movie->name}} / {{$movie->duration}}</div>
			@endforeach
			<p>
				<img src="assets/img/trashcan.png" id="trash" alt="">
			</p>
		</div>

		<div id='calendar'></div>

		<div style='clear:both'></div>

		<xspan class="tt">x</xspan>

	</div>
</body>
</html>
