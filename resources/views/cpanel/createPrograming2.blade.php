@if (!Auth::guest())
	@if (Auth::user()->tipo == "administrador")
		@extends('layouts.controlPanel')
		@section('content')

			<style>

			.wrap {
				text-align: center;
				font-size: 14px;
			}

			#trash{
				width:50px;
				height:50px;
				float:left;
				padding-bottom: 15px;
				position: relative;
			}
				
			#wrap {
				margin: 0 auto;
			}
				
			#external-events {
				float: left;
				padding: 0 10px;
				border: 1px solid #ccc;
				background: #eee;
				text-align: left;
				margin-top: 10px;
    			margin-bottom: 10px;
			}
				
			#external-events h4 {
				font-size: 16px;
				margin-top: 0;
				padding-top: 1em;
			}
			
			.fc h2 {
			   font-size: 15px;
			}
			.btn-primary{
				background-color: #F0643C !important;
				border-color:  #F0643C !important;
			}
				
			#external-events .fc-event {
				margin: 10px 0;
				cursor: pointer;
			}
			.fc-event{
				background-color: #F0643C !important;
				border: 1px solid #F0643C !important;
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

		</style>

			<h3 class="orangeAndBoldText" style="margin-bottom: 30px; padding-left: 15px;">Programación de Parrilla Programática</h3>

			<div id='wrap' class="col-md-12" style=" padding-top: 20px;">

			{{--
			acomodar tarro basura
			modificar header
			traducir --}}

				<div id='external-events' class="col-xs-12 col-sm-12 col-md-3">
					
					<table class="table" data-filtering="true">
						<thead>
							<th data-type="html">Seleccionar Video</th>
						</thead>
						<tbody>
							@foreach($movies as $movie)
							<tr>
								<td>
									
									<div class='fc-event' data-url="{!!$movie->url!!}">{{$movie->name}} / {{$movie->duration}}</div>
								</td>
							</tr>
							@endforeach
						</tbody>
					</table>
					<div class="col-xs-12" id="divTrash">
						<p>
							<img src="/img/trashcan.png" id="trash" alt="">
						</p>
					</div>
				</div>

				<div id='calendar' class="col-xs-12 col-sm-12 col-md-9"></div>

				<div style='clear:both'></div>

				<xspan class="tt"></xspan>

			</div>

		@stop
		@section('page-style-files')
			<link href="/css/footable.bootstrap.css" rel="stylesheet">
			<link href='/fullcalendar/fullcalendar.css' rel='stylesheet' />
			<link href='/fullcalendar/fullcalendar.print.css' rel='stylesheet' media='print' />
	    @stop
	    @section('page-js-files')
	    	

	        <script src='/fullcalendar/lib/moment.min.js'></script>
			<script src='/fullcalendar/lib/jquery.min.js'></script>
			<script src='/fullcalendar/lib/jquery-ui.min.js'></script>
			<script src='/fullcalendar/fullcalendar.min.js'></script>
			<script src='/fullcalendar/locale/es.js'></script>
			<script src="/js/footable.min.js"></script>
	    @stop

	    @section('page-js-script')
	    	<script type="text/javascript">
				//var j = jQuery.noConflict();
				$(function($){
					$('.table').footable({
						"filtering": {
							"enabled": true
						}
					});
				});
			</script>
	    	<script>
				$(document).ready(function() {

					var zone = "05:30";  //Change this to your timezone

					$.ajax({
						url: 'process.php',
				        type: 'POST', // Send post data
				        data: 'type=fetch',
				        async: false,
				        success: function(s){
				        	json_events = s;
				        }
					});

					var currentMousePos = {
					    x: -1,
					    y: -1
					};
						jQuery(document).on("mousemove", function (event) {
				        currentMousePos.x = event.pageX;
				        currentMousePos.y = event.pageY;
				    });

				/*var currentMousePos = {
				    x: -1,
				    y: -1
				};
					jQuery(document).on("mousemove", function (event) {
			        currentMousePos.x = event.pageX;
			        currentMousePos.y = event.pageY;
			    });*/

					/* initialize the external events
					-----------------------------------------------------------------*/

					$('#external-events .fc-event').each(function() {

						// store data so the calendar knows to render an event upon drop
						$(this).data('event', {
							title: $.trim($(this).text()).split('/')[0], // use the element's text as the event title
							stick: true, // maintain when user navigates (see docs on the renderEvent method)
							duration: $.trim($(this).text()).split('/')[1],
							url: $(this).data('url'),
							
						});

						// make the event draggable using jQuery UI
						$(this).draggable({
							zIndex: 999,
							revert: true,      // will cause the event to go back to its
							revertDuration: 0  //  original position after the drag
						});

					});

					//titleFormat: '[Programar Parrilla]',
					/* initialize the calendar
					-----------------------------------------------------------------*/

					$('#calendar').fullCalendar({
						events: JSON.parse(json_events),
						utc: true,
						header: {
							left: 'prev,next today',
							center: 'title',
							right: ''
						},
						
						lang: 'es',
						editable: true,
						droppable: true, // this allows things to be dropped onto the calendar
						defaultView: 'agendaDay',
						allDaySlot: false,
						slotDuration: '00:01:00',
						eventOverlap: false,
						eventDurationEditable: false,
						eventReceive: function(event){
							var title = event.title;
							//var start = event.start.format("YYYY-MM-DD[T]HH:mm:SS");
							var start = event.start.format();
							var end = event.end.format();
							var url = event.url;

							
							//alert("ini: "+start+" fin: "+end);
							$.ajax({
					    		url: 'process.php',
					    		data: 'type=new&title='+title+'&startdate='+start+'&zone='+zone+'&enddate='+end+'&url='+url,
					    		type: 'POST',
					    		dataType: 'json',
					    		success: function(response){
					    			event.id = response.eventid;
					    			$('#calendar').fullCalendar('updateEvent',event);
					    		},
					    		error: function(e){
					    			console.log(e.responseText);

					    		}
					    	});
							$('#calendar').fullCalendar('updateEvent',event);
							console.log(event);
						},
						eventDrop: function(event, delta, revertFunc) {
							//alert("eventDrop: "+event);
					        var title = event.title;
					        var start = event.start.format();
					        var end = event.end.format();
					        //var end = (event.end == null) ? start : event.end.format();
					        $.ajax({
								url: 'process.php',
								data: 'type=resetdate&title='+title+'&start='+start+'&end='+end+'&eventid='+event.id,
								type: 'POST',
								dataType: 'json',
								success: function(response){
									if(response.status != 'success')	    				
									revertFunc();
								},
								error: function(e){		    			
									revertFunc();
									alert('Error al procesar la petición: '+e.responseText);
								}
							});
					    },
					    
						eventResize: function(event, delta, revertFunc) {
							console.log(event);
							alert("eventDrop: "+event);

							//alert("eventResize: ",event);
							var title = event.title;
							var end = event.end.format();
							var start = event.start.format();
					        $.ajax({
								url: 'process.php',
								data: 'type=resetdate&title='+title+'&start='+start+'&end='+end+'&eventid='+event.id,
								type: 'POST',
								dataType: 'json',
								success: function(response){
									if(response.status != 'success')		    				
									revertFunc();
								},
								error: function(e){		    			
									revertFunc();
									alert('Error processing your request: '+e.responseText);
								}
							});
					    },
					   
						eventDragStop: function (event, jsEvent, ui, view) {
							if(isElemOverDiv()){
								var con = confirm('¿Esta seguro de eliminar este video de la programación?');
						    	if(con == true) {
									$.ajax({
							    		url: 'process.php',
							    		data: 'type=remove&eventid='+event.id,
							    		type: 'POST',
							    		dataType: 'json',
							    		success: function(response){
							    			console.log(response);
							    			if(response.status == 'success'){
							    				$('#calendar').fullCalendar('removeEvents');
			            						getFreshEvents();
			            					}
							    		},
							    		error: function(e){	
							    			alert('Error processing your request: '+e.responseText);
							    		}
						    		});
								} 
							}
						}
					});

				function getFreshEvents(){
					$.ajax({
						url: 'process.php',
				        type: 'POST', // Send post data
				        data: 'type=fetch',
				        async: false,
				        success: function(s){
				        	freshevents = s;
				        }
					});
					$('#calendar').fullCalendar('addEventSource', JSON.parse(freshevents));
				}


				function isElemOverDiv() {
					
					var trashEl = jQuery('#divTrash');
			        //var trashEl = jQuery('#trash');

			        var ofs = trashEl.offset();

			        var x1 = ofs.left;
			        var x2 = ofs.left + trashEl.outerWidth(true);
			        var y1 = ofs.top;
			        var y2 = ofs.top + trashEl.outerHeight(true);

			        if (currentMousePos.x >= x1 && currentMousePos.x <= x2 &&
			            currentMousePos.y >= y1 && currentMousePos.y <= y2) {
			            return true;
			        }
			        return false;
			    }

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