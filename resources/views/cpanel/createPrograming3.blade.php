<!DOCTYPE html>
<html>
<head>
<meta charset='utf-8' />
<link href='/fullcalendar-3.2.0/fullcalendar.css' rel='stylesheet' />
<link href='/fullcalendar-3.2.0/fullcalendar.print.css' rel='stylesheet' media='print' />
<script src='/fullcalendar-3.2.0/lib/moment.min.js'></script>
<script src='/fullcalendar-3.2.0/lib/jquery.min.js'></script>
<script src='/fullcalendar-3.2.0/lib/jquery-ui.min.js'></script>
<script src='/fullcalendar-3.2.0/fullcalendar.js'></script>
{{-- Crear arreglo con nombre y duracion para comparar con $(this).text()
Guardar en bd
dejar peliculas con tiempo fijo en horario
agregar buscador a peliculas
que no pueda haber mas de una pelicula en el mismo horario --}}
<script>
	$(document).ready(function() {
		
		/* initialize the external events
		-----------------------------------------------------------------*/
		$('#external-events .fc-event').each(function() {
			// store data so the calendar knows to render an event upon drop
			//$elements = $.trim($(this).text()).split('/');

			$(this).data('event', {
				title: $.trim($(this).text()).split('/')[0], // use the element's text as the event title
				stick: true, // maintain when user navigates (see docs on the renderEvent method)
				duration: $.trim($(this).text()).split('/')[1],
				//duration: '03:00:00'
			});
			// make the event draggable using jQuery UI
			$(this).draggable({
				zIndex: 999,
				revert: true,      // will cause the event to go back to its
				revertDuration: 0  //  original position after the drag
			});
		});
		/* initialize the calendar
		-----------------------------------------------------------------*/
		$('#calendar').fullCalendar({
			header: {
				center: 'title'
			},
			editable: true,
			droppable: true, // this allows things to be dropped onto the calendar
			defaultView: 'agendaDay',
			allDaySlot: false,
			drop: function() {
				// is the "remove after drop" checkbox checked?
				if ($('#drop-remove').is(':checked')) {
					// if so, remove the element from the "Draggable Events" list
					$(this).remove();
				}
			}
		});
	});
</script>
<style>
	body {
		margin-top: 40px;
		text-align: center;
		font-size: 14px;
		font-family: "Lucida Grande",Helvetica,Arial,Verdana,sans-serif;
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
			<h4>Draggable Events</h4>
			@foreach($movies as $movie)
			<div class='fc-event'>{{$movie->name}} / {{$movie->duration}}</div>
			@endforeach
			{{-- <div class='fc-event'>My Event 1</div>
			<div class='fc-event'>My Event 2</div>
			<div class='fc-event'>My Event 3</div>
			<div class='fc-event'>My Event 4</div>
			<div class='fc-event'>My Event 5</div> --}}
		</div>

		<div id='calendar'></div>

		<div style='clear:both'></div>

	</div>
</body>
</html>