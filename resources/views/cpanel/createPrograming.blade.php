@extends('layouts.panelprofesor')
@section('content')


{{--  
menu responsive
<div id="sidebar-wrapper">
    <ul class="sidebar-nav">
      <li class="sidebar-brand">
      <a href="#menu-toggle" class="btn btn-default" id="menu-toggle"><span class="glyphicon glyphicon-align-justify" aria-hidden="true"></span></a>
       --}}

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script type="text/javascript" src="/assets/vendor/moment/min/moment.min.js"></script>
<script type="text/javascript" src="/js/locale/es.js"></script>
<script type="text/javascript" src="/assets/vendor/eonasdan-bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js"></script>


<script src="http://listjs.com/assets/javascripts/list.min.js"></script>
<script type="text/javascript" src="/assets/vendor/list.pagination.js/dist/list.pagination.js"></script>

<script type="text/javascript" src="/js/jquery.dynatable.js"></script>

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
	        <div class="alert alert-danger">
				<strong>El horario seleccionado ya se encuentra en uso!</strong> Seleccione otro horario para la programación
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
	/*function toSeconds(s) {
		var p = s.split(':');
		return parseInt(p[0], 10) * 3600 + parseInt(p[1], 10) * 60 + parseInt(p[2], 10);
	}

	function fill(s, digits) {
		s = s.toString();
		while (s.length < digits) s = '0' + s;
			return s;
	}
	var actualDuration = "00:00:00"
	function UpdateDuration(check, duration){
		if(document.getElementById(check).checked == true){
			var sec = toSeconds(actualDuration) + toSeconds(duration);

		}else{
			var sec = toSeconds(actualDuration) - toSeconds(duration);
		}
		var result = fill(Math.floor(sec / 3600), 2) + ':' + fill(Math.floor(sec / 60) % 60, 2) + ':' + fill(sec % 60, 2);
		actualDuration = result;
		document.getElementById('durationView').innerHTML = "Duración: " + actualDuration;
		document.getElementById('duration').value = actualDuration;

		var start_date = document.getElementById('start').value;
		document.getElementById('start_tittle').innerHTML = "Hora de Inicio: " + start_time;

		
		var temp = start_date.split(" ");
		var start_time = temp[1];
		var temp2 = start_time.split(":");
		var hour = temp2[0];
		var minute = temp2[1];
		var seconds = temp2[2];
		var end_program = new Date();
		end_program.setHours(hour);
		end_program.setMinutes(minute);
		end_program.setSeconds(seconds);

		document.getElementById('end_tittle').innerHTML = "Fin: " + end_program;
		
		//document.getElementById('duration').value = actualDuration;
		function checkTime(i) {
		    if (i < 10) {
		        i = "0" + i;
		    }
		    return i;
		}
		function startTime() {
		    var today = new Date();
		    var h = today.getHours();
		    var m = today.getMinutes();
		    var s = today.getSeconds();
		    // add a zero in front of numbers<10
		    m = checkTime(m);
		    s = checkTime(s);
		    document.getElementById('time').innerHTML = h + ":" + m + ":" + s;
		    t = setTimeout(function () {
		        startTime()
		    }, 500);
		}
		startTime();
		}*/
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
		var programation = [];
		var programationTable = [];
		programationTable.push(["Nombre", "Inicio"]);
		
		function addToList(id, name, url, duration){
			var actualId = id;
			var actualName = name;
			var actualUrl = url;
			var actualDuration = duration;

			/*var addMovie = {
			    "id": " " + actualId + " ",
			    "name": " " +actualName + " ",
			    "url": " " +actualUrl + " ",
			    "duration": " " +duration + " "
			};*/

			programationTable.push([actualName, actualDuration]);

			var addMovie = '{"id":"' + actualId + '","name":"' + actualName + ',"url":"' + actualUrl + ' ,"duration":"'+ duration +'"}';
			programation.push(addMovie);

			document.getElementById('program').innerHTML = programation;
			GenerateTable();
		} 
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
				GenerateTable();
		    }
		}

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
		      {{-- <li>
		        <h3 class="name">Jonas Arnklint</h3>
		        <p class="born">1985</p>
		      </li> --}}
		    </ul>
		    <ul class="pagination"></ul>
  		</div>

	</div>
	<div class="col-md-4 pre-scrollable">
		<H5 id="start_tittle" style="margin-top: 0">Agregados</H3>
		<H3 id="end_tittle" style="margin-top: 0">Agregados</H3>
		<div id="time"></div>

		<div id="program"></div>

		<div id="dvTable">
		</div>

	<div class="col-md-12">
		<button type="button" class="btn btn-danger" onclick="cleanProgramming()">Limpiar Programación</button>
		<button type="button" class="btn btn-primary" name="sendProgram">Enviar</button>
	</div>

	</div>
</div>

@endif
@endsection