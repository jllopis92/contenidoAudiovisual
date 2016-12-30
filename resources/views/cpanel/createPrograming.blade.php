@extends('layouts.controlPanel')
@section('content')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script type="text/javascript" src="/assets/vendor/moment/min/moment.min.js"></script>
<script type="text/javascript" src="/js/locale/es.js"></script>
<script type="text/javascript" src="/assets/vendor/eonasdan-bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js"></script>


<script src="http://listjs.com/assets/javascripts/list.min.js"></script>
<script type="text/javascript" src="/assets/vendor/list.pagination.js/dist/list.pagination.js"></script>

<script type="text/javascript" src="/js/jquery.dynatable.js"></script>
{{-- <script type="text/javascript" src="/js/sendProgramming.js"></script> --}}


<style type="text/css">
	.list {
  font-family:sans-serif;
  margin:0;
  padding:20px 0 0;
}
.list > li {
  display:block;
  background-color: #eee;
  padding:10px;
  box-shadow: inset 0 1px 0 #fff;
}
.avatar {
  max-width: 150px;
}
img {
  max-width: 100%;
}
h3 {
  font-size: 16px;
  margin:0 0 0.3rem;
  font-weight: normal;
  font-weight:bold;
}
p {
  margin:0;
}

input {
  border:solid 1px #ccc;
  border-radius: 5px;
  padding:7px 14px;
  margin-bottom:10px
}
input:focus {
  outline:none;
  border-color:#aaa;
}
.sort {
  padding:8px 30px;
  border-radius: 6px;
  border:none;
  display:inline-block;
  color:#fff;
  text-decoration: none;
  background-color: #28a8e0;
  height:30px;
}
.sort:hover {
  text-decoration: none;
  background-color:#1b8aba;
}
.sort:focus {
  outline:none;
}
.sort:after {
  width: 0;
  height: 0;
  border-left: 5px solid transparent;
  border-right: 5px solid transparent;
  border-bottom: 5px solid transparent;
  content:"";
  position: relative;
  top:-10px;
  right:-5px;
}
.sort.asc:after {
  width: 0;
  height: 0;
  border-left: 5px solid transparent;
  border-right: 5px solid transparent;
  border-top: 5px solid #fff;
  content:"";
  position: relative;
  top:13px;
  right:-5px;
}
.sort.desc:after {
  width: 0;
  height: 0;
  border-left: 5px solid transparent;
  border-right: 5px solid transparent;
  border-bottom: 5px solid #fff;
  content:"";
  position: relative;
  top:-10px;
  right:-5px;
}
</style>

@if (count($movies) === 0)
<h5 style="margin-top: 30px;">No existen videos disponibles</h5>
@elseif (count($movies) >= 1)

<H3 style="margin-top: 30px">Programar Videos</H3>

<H4 style="margin-top: 20px">Seleccione Horario de comienzo</H4>

{{-- {!! Form::open(['id' => 'newPlaylist', 'route' =>'programing.store', 'method'=>'POST', 'data-parsley-validate'=>'' ]) !!} --}}
<div class = "form-group">

    {{-- <div class='input-group date' id='datetimepicker'>
        <input id='start' type='text' class="form-control" />
        <span class="input-group-addon">
        <span class="glyphicon glyphicon-calendar"></span>
        </span>
    </div>  --}}

    <div class="row">
        <div class="col-md-6">
	        <div class='input-group date' id='datetimepicker'>
		        <input id='start' type='text' class="form-control" />
		        <span class="input-group-addon">
		        <span class="glyphicon glyphicon-calendar"></span>
		        </span>
	        </div>
	        <div class="alert alert-danger" style="display: none">
				<strong>El horario seleccionado ya se encuentra en uso.</strong> Seleccione otro horario para la programación.
			</div>
        {{-- <div id="sandbox-container div"></div> --}}
            {{-- <div id="datetimepicker"></div> --}}
            
        </div>
        <div class="col-md-6">
        {{-- <input type="button" name="aler" id="aler">
        <input type="text" name="alertext" id="alertext">
        	<H3 style="margin-top: 0">El Horario se encuentra ocupado</H3>
        </div> --}}
    	</div>
	</div>

	<script type="text/javascript">
        $(function () {
         	$('#datetimepicker').datetimepicker({
                locale: 'es',
                format: 'YYYY-MM-DD HH:mm:ss',
                sideBySide: true
            });
            //checkCreationDate();
        });
    </script>

    <script type="text/javascript">
    	$('#datetimepicker').on('dp.change', function(e){
    		//TODO: Crear funcion cuando cambia la hora y validar si esta disponible ese horario
    		var jsonArr = e.date;
    		var dateProgram = new Date(jsonArr);
    		console.log("dateProgram: ", dateProgram);
    		console.log("hora: ", dateProgram.getHours());
    		console.log("minutos: ", dateProgram.getMinutes());
    		console.log("año: ", dateProgram.getUTCFullYear());
    	});
    </script>

{{-- <div class = "form-group" style ="display: none;">
{!! Form::label('duration', 'Duración :') !!}
{!! Form::text('duration', null, ['class'=> 'form-control', 'required'=> '']) !!}
</div>

<div class = "form-group">
	<label id="durationView" class="col-md-4 control-label">Duración: 00:00:00</label>
</div>
 --}}
 <script type="text/javascript">
            //var j = jQuery.noConflict();
            
            /*j('#name').on('input',function(e){
                
            });*/
            /*var j = jQuery.noConflict();
            j(function () {
              j('#demo-form').parsley().on('field:validated', function() {
                var ok = j('.parsley-error').length === 0;
                j('.bs-callout-info').toggleClass('hidden', !ok);
                j('.bs-callout-warning').toggleClass('hidden', ok);
            })
              .on('form:submit', function() {
                return false; // Don't submit form for this demo
            });
          });*/
      </script>
<script type="text/javascript">
		//Tiempo cero
		var timeDuration = "00:00:00"
		//Crear lista para seleccion de videos
		$(document).ready(function(e) {
			var options = {
			  valueNames: [ 'name', 'duration' ],
			  page: 5,
			  plugins: [
			      ListPagination({})
			    ]
			};
			var moviesList = new List('movies', options);
		});
		//Json para envio a servidor
		var programation = [];
		//Json para crear tablas
		var programationTable = [];
		//Tiempo de inicio de reproduccion de video actual
		var timeToPlay = "00:00:00";
		//True si la programacion es vacia
		var firstTime = true;
		//Agrega Titulos a tabla
		programationTable.push(["Nombre", "Inicio"]);

		/**
		* Función que checkea si la hora de inicio fue asignada (obligatorio)
		**/
		function getSelectedHour(){
			//Toma el valor de variable DateTime
			var start_date = document.getElementById('start').value;
			if(start_date == ""){
				return null;
			}else{
				var castDate = new Date(start_date);
				var hours = castDate.getHours();
				var minutes = castDate.getMinutes();
				var seconds = castDate.getSeconds();
				var timeToStart = hours + ":" + minutes + ":" + seconds;
				return timeToStart;
			}
		}
		/**
		* Agrega elementos a tabla y a lista para envío
		**/
		function addToList(id, name, url, duration){

			var timeSelected = getSelectedHour();
			if(timeSelected == null){
				alert("Debe Ingresar Fecha y hora de comienzo");
			}else{
				if(firstTime){
					timeToPlay = timeSelected;
				}
				//Asignaciones de variables recibidas
				var actualId = id;
				var actualName = name;
				var actualUrl = url;
				var actualDuration = duration;
				//Agrega nuevos datos a Json para tablas
				timeToPlay = checkTime(timeToPlay);
				programationTable.push([actualName, timeToPlay]);

				//Se asigna la fecha seleccionada y luego se separa
				var start_date = document.getElementById('start').value;
				var castDate = new Date(start_date);
				var day = castDate.getUTCDate();
				var month = castDate.getUTCMonth(); //months from 1-12
				var year = castDate.getUTCFullYear();
				if(day <= 9){
					day = '0' + day;
				}
				if(month <= 9){
					month = '0' + month;
				}

				//Convierte a segundos y suma el tiempo actual con la duracion del video ingresado
				var sec = toSeconds(timeToPlay) + toSeconds(actualDuration);
				//Transforma los segundos a formato HH:mm:ss
				var result = fill(Math.floor(sec / 3600), 2) + ':' + fill(Math.floor(sec / 60) % 60, 2) + ':' + fill(sec % 60, 2);
				//Variable temporal
				var timeToEnd = result;

				//El tiempo de inicio y el tiempo de fin, son separados en horas, minutos y segundos y luego asignados junto con la fecha actual
				var elemStart = timeToPlay.split(':');
				var hourStart = elemStart[0];
				var minuteStart = elemStart[1];
				var secondStart = elemStart[2];

				if(hourStart <= 9){
					hourStart = '0' + hourStart;
				}
				if(minuteStart <= 9){
					minuteStart = '0' + minuteStart;
				}
				if(secondEnd <= 9){
					secondEnd = '0' + secondEnd;
				}
				var dateToPlay = new Date(year, month, day, hourStart, minuteStart, secondStart);

				var elemEnd = timeToEnd.split(':');
				var hourEnd = elemEnd[0];
				var minuteEnd = elemEnd[1];
				var secondEnd = elemEnd[2];

				if(hourEnd <= 9){
					hourEnd = '0' + hourEnd;
				}
				if(minuteEnd <= 9){
					minuteEnd = '0' + minuteEnd;
				}
				if(secondEnd <= 9){
					secondEnd = '0' + secondEnd;
				}

				var dateToEnd = new Date(year, month, day, hourEnd, minuteEnd, secondEnd);
				//Json creado con datos recibidos
				var addMovie = '{"id":"' + actualId + '","name":"' + actualName + '","url":"' + actualUrl + '" ,"duration":"'+ duration +'","play_at":"' + dateToPlay +'","end_at":"' + dateToEnd +'"}';
				//Agrega nuevos datos a Json para envio
				programation.push(addMovie);
				//Reasigna el tiempo de inicio para el siguiente video
				timeToPlay = timeToEnd;

				//Calcula duracion independiente de la hora de inicio y transforma los segundos a formato HH:mm:ss
				var sec = toSeconds(timeDuration) + toSeconds(actualDuration);
				var result = fill(Math.floor(sec / 3600), 2) + ':' + fill(Math.floor(sec / 60) % 60, 2) + ':' + fill(sec % 60, 2);
				//asgina resultado a variable iterativa
				timeDuration = result;
				//TODO: Muestra tiempo actual (Borrar)
				document.getElementById('total_duration').innerHTML = "Duración Total: " + timeDuration;
				//TODO: Muestra json actual (Borrar)
				document.getElementById('program').innerHTML = programation;
				//Finaliza el primer ciclo
				firstTime = false;
				//Genera nueva tabla
				GenerateTable();
			}
		}
		/**
		* Si la hora es mayor a 23, pasa al dia siguiente
		**/
		function checkTime(timeToPlay){
			var elemStart = timeToPlay.split(':');
			var hourStart = elemStart[0];
			var minuteStart = elemStart[1];
			var secondStart = elemStart[2];
			if(hourStart == '24'){
				hourStart = '00';
			} else if(hourStart == '25'){
				hourStart = '01';
			} else if(hourStart == '26'){
				hourStart = '02';
			}
			var newTimeToPlay = hourStart + ":" + minuteStart + ":" + secondStart;
			return newTimeToPlay;
		}
		/**
		* Borrar toda la programación con sus respectivas tablas y listas
		**/
		function cleanProgramming(){
		    if (confirm("¿Esta seguro de limpiar la programación? Los datos que no han sido guardados se perderan") == true) {
		    	while(programationTable.length > 0) {
				    programationTable.pop();
				}
				programationTable.push(["Nombre", "Inicio"]);
				while(programation.length > 0) {
				    programation.pop();
				}
				document.getElementById('program').innerHTML = programation;

				firstTime = true;
				timeDuration = "00:00:00"
				document.getElementById('total_duration').innerHTML = "Duración Total: " + timeDuration;
				GenerateTable();
		    }
		}
		/**
		* Genera tabla con Json enviado
		**/
		function GenerateTable() {
		    //Build an array containing Customer records.
		    /*var customers = new Array();
		    customers.push(["Customer Id", "Name", "Country"]);
		    customers.push([1, "John Hammond", "United States"]);
		    customers.push([2, "Mudassar Khan", "India"]);
		    customers.push([3, "Suzanne Mathews", "France"]);
		    customers.push([4, "Robert Schidner", "Russia"]);
		 	*/
		    //Create a HTML Table element.
		    var table = document.createElement("table");
		    table.className = "table";
		    //table.border = "1";
		 
		    //Get the count of columns.
		    var columnCount = programationTable[0].length;
		 
		    //Add the header row.
		    var row = table.insertRow(-1);
		    for (var i = 0; i < columnCount; i++) {
		        var headerCell = document.createElement("th");
		        headerCell.innerHTML = programationTable[0][i];
		        row.appendChild(headerCell);
		    }
		 
		    //Add the data rows.
		    for (var i = 1; i < programationTable.length; i++) {
		        row = table.insertRow(-1);
		        for (var j = 0; j < columnCount; j++) {
		            var cell = row.insertCell(-1);
		            cell.innerHTML = programationTable[i][j];
		        }
		    }
		 
		    var dvTable = document.getElementById("dvTable");
		    dvTable.innerHTML = "";
		    dvTable.appendChild(table);
		}

		function toSeconds(s) {
			var p = s.split(':');
			return parseInt(p[0], 10) * 3600 + parseInt(p[1], 10) * 60 + parseInt(p[2], 10);
		}

		function fill(s, digits) {
			s = s.toString();
			while (s.length < digits) s = '0' + s;
				return s;
		}
		/**
		* Envia Json a servidor
		**/
		function sendProgramming(){
			if(programationTable.length <= 0){
				alert ("No se han agregado elementos a la programación");
			}else{
				var programToSend = '[' + programation + ']';
				//alert ("A enviar: "+ programToSend);
				/*$array = json_decode($json);
				foreach($array as $obj){
				$play_at = $obj->play_at;
                $end_at = $obj->end_at;
                }*/
				/*j.post('../emailValid.php',{
                    email:j('#email').val(),

                },function(d){
                    if(d>0){
                        //alert('Respuesta:'+d);
                    }else{
                        if(d != ""){
                            document.getElementById("emailValidation").style.display = "inline";
                            document.getElementById("emailValidation").innerHTML = 'Este correo ya se encuentra registrado';
                            validEmail = 0;
                        }
                    }
                });*/

				sendToDb(programToSend);
				
			}
		}
		function sendToDb(programToSend){
			var j = jQuery.noConflict();
				var token = j("#token").val();
				var route = "/programing";
				j.ajax({
					url: route,
					headers: {'X-CSRF-TOKEN': token},
					type: 'POST',
					dataType: 'json',
					data:{jsonSend: programToSend},
					success: function (msg) {
		                if (msg) {
		                   alert("Somebody" + msg + " was added in list !");
		                   location.reload(true);
		                } else {
		                   //alert("Cannot add to list !");
		                }
		           }
				});
		}
	</script>
<div class="row">
	<div class="col-md-8 pre-scrollable">
		<H4 style="margin-top: 20px">Seleccione Videos a agregar</H4>

		<div id="movies">
		    <input class="search" placeholder="Buscar Video" />
		    {{-- <button class="sort" data-sort="name">
		      Sort by name
		    </button> --}}
		  
		    <ul class="list">
		    @foreach($movies as $movie)
		   
		      <li onclick="addToList('{{$movie->id}}','{{$movie->name}}','{{$movie->url}}','{{$movie->duration}}');">
		      		<h3 class="name">{{$movie->name}}</h3>
		        	<p class="duration">{{$movie->duration}}</p>
		      </li>
		    @endforeach
		    </ul>
		    <ul class="pagination"></ul>
  		</div>

	</div>
	<div class="col-md-4 pre-scrollable">
		
		<H3 id="end_tittle" style="margin-top: 0">Agregados</H3>
		<div id="time" style="display: none"></div>

		<div id="program" style="display: none"></div>

		<div id="dvTable">
		</div>

		<H5 id="total_duration" style="margin-top: 0">Agregados</H3>

	<div class="col-md-12">
		<button type="button" class="btn btn-danger" onclick="cleanProgramming()">Limpiar Programación</button>
		{!!Form::open()!!}
		<input type="hidden" name="_token" value="{{ csrf_token() }}" id="token">
		<button type="button" class="btn btn-primary" onclick="sendProgramming()">Enviar</button>
		{!!Form::close()!!}
	</div>

	</div>
</div>

@endif
@endsection