@extends('layouts.panelprofesor')
@section('content')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script type="text/javascript" src="/assets/vendor/moment/min/moment.min.js"></script>
<script type="text/javascript" src="/js/locale/es.js"></script>
<script type="text/javascript" src="/assets/vendor/eonasdan-bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js"></script>

<script src="http://listjs.com/assets/javascripts/list.min.js"></script>


@if (count($movies) === 0)
<h5 style="margin-top: 30px;">No existen videos disponibles</h5>
@elseif (count($movies) >= 1)

<H3 style="margin-top: 30px">Programar Videos</H3>

<H4 style="margin-top: 20px">Seleccione Horario de comienzo</H4>

{!! Form::open(['id' => 'newPlaylist', 'route' =>'programing.store', 'method'=>'POST', 'data-parsley-validate'=>'' ]) !!}
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
    		{{-- <div id="sandbox-container div"></div> --}}
    		{{-- <div id="datetimepicker"></div> --}}

    	</div>
    	<div class="col-md-6">
    		<input type="button" name="aler" id="aler">
    		<input type="text" name="alertext" id="alertext">
    		<H3 style="margin-top: 0">El Horario se encuentra ocupado</H3>
    	</div>
    </div>

</div>

<script type="text/javascript">
	$(function () {
		$('#datetimepicker').datetimepicker({
			locale: 'es',
			format: 'YYYY-MM-DD HH:mm:ss',
			sideBySide: true
		});
                /*$( "#datetimepicker" ).click(function() {
                	$("#alertext").val($("#start").val());
				  //alert( $("#start").val());
				});*/

               /* var datetimepicker = $('#datetimepicker').val();
               $('#start').val(datetimepicker);*/
                /*var datetimepicker = document.getElementById('datetimepicker');
                var start = document.getElementById('start');
                start.value = datetimepicker.value;*/
            });
        </script>

        <div class = "form-group" style ="display: none;">
        	{!! Form::label('duration', 'Duración :') !!}
        	{!! Form::text('duration', null, ['class'=> 'form-control', 'required'=> '']) !!}
        </div>

        <div class = "form-group">
        	<label id="durationView" class="col-md-4 control-label">Duración: 00:00:00</label>
        </div>

        <script type="text/javascript">
        	//var data = [];
        	var dynamicTable = (function() {

				var _tableId, _table, 
				_fields, _headers, 
				_defaultText;

			    /** Builds the row with columns from the specified names. 
			     *  If the item parameter is specified, the memebers of the names array will be used as property names of the item; otherwise they will be directly parsed as text.
			     */
			    function _buildRowColumns(names, item) {
			     	var row = '<tr>';
			     	if (names && names.length > 0)
			     	{
			     		$.each(names, function(index, name) {
			     			var c = item ? item[name+''] : name;
			     			row += '<td>' + c + '</td>';
			     		});
			     	}
			     	row += '<tr>';
			     	return row;
			    }

		     	/** Builds and sets the headers of the table. */
			    function _setHeaders() {
			        // if no headers specified, we will use the fields as headers.
			        _headers = (_headers == null || _headers.length < 1) ? _fields : _headers; 
			        var h = _buildRowColumns(_headers);
			        if (_table.children('thead').length < 1) _table.prepend('<thead></thead>');
			        _table.children('thead').html(h);
			    }
			    
			    function _setNoItemsInfo() {
			        if (_table.length < 1) return; //not configured.
			        var colspan = _headers != null && _headers.length > 0 ? 
			        'colspan="' + _headers.length + '"' : '';
			        var content = '<tr class="no-items"><td ' + colspan + ' style="text-align:center">' + 
			        _defaultText + '</td></tr>';
			        if (_table.children('tbody').length > 0)
			        	_table.children('tbody').html(content);
			        else _table.append('<tbody>' + content + '</tbody>');
			    }
		    
			    function _removeNoItemsInfo() {
			    	var c = _table.children('tbody').children('tr');
			    	if (c.length == 1 && c.hasClass('no-items')) _table.children('tbody').empty();
			    }
		    
			    return {
			    	/** Configres the dynamic table. */
			    	config: function(tableId, fields, headers, defaultText) {
			    		_tableId = tableId;
			    		_table = $('#' + tableId);
			    		_fields = fields || null;
			    		_headers = headers || null;
			    		_defaultText = defaultText || 'No items to list...';
			    		_setHeaders();
			    		_setNoItemsInfo();
			    		return this;
			    	},
			    	/** Loads the specified data to the table body. */
			    	load: function(data, append) {
			            if (_table.length < 1) return; //not configured.
			            _setHeaders();
			            _removeNoItemsInfo();
			            if (data && data.length > 0) {
			            	var rows = '';
			            	$.each(data, function(index, item) {
			            		rows += _buildRowColumns(_fields, item);
			            	});
			            	var mthd = append ? 'append' : 'html';
			            	_table.children('tbody')[mthd](rows);
			            }
			            else {
			            	_setNoItemsInfo();
			            }
			            return this;
			        },
			        /** Clears the table body. */
			        clear: function() {
			        	_setNoItemsInfo();
			        	return this;
			        }
			    };
			}());
        	var dt = dynamicTable.config('data-table', 
			['field1', 'field2'], 
                                 ['Video', 'Hora de Inicio'], //set to null for field names instead of custom header names
                                 'No se han agregado videos');
        	var actualDuration = "00:00:00"

        	function toSeconds(s) {
        		var p = s.split(':');
        		return parseInt(p[0], 10) * 3600 + parseInt(p[1], 10) * 60 + parseInt(p[2], 10);
        	}

        	function fill(s, digits) {
        		s = s.toString();
        		while (s.length < digits) s = '0' + s;
        		return s;
        	}

        	function UpdateDuration(check, name, duration){
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
				var dataTemp = [{ field1: name, field2: duration}];
				dt.load(dataTemp, true);
			}

	$(document).ready(function(e) {
/*
		var data = [];
		var data1 = [
		{ field1: 'value a1', field2: 'value a2'},
		{ field1: 'value b1', field2: 'value b2'},
		{ field1: 'value c1', field2: 'value c2'}
		];

		var data2 = [
		{ field1: 'new value a1', field2: 'new value a2' },
		{ field1: 'new value b1', field2: 'new value b2' },
		{ field1: 'new value c1', field2: 'new value c2' }
		];*/

		var dt = dynamicTable.config('data-table', 
			['field1', 'field2'], 
                                 ['Video', 'Hora de Inicio'], //set to null for field names instead of custom header names
                                 'No se han agregado videos');


		/*$('#btn-load').click(function(e) {
			dt.load(data1);
		});

		$('#btn-update').click(function(e) {
			dt.load(data2);
		});

		$('#btn-append').click(function(e) {
			dt.load(data1, true);
		});

		$('#btn-clear').click(function(e) {
			dt.clear();
		});*/

	});
</script>
<div class="row">
	<div class="col-md-8">
		<H4 style="margin-top: 20px">Seleccione Videos a agregar</H4>

		<table class="table">
			<thead>
				<th>Nombre</th>
				<th>Categoria</th>
				<th>Duración</th>
				<th>Agregar</th>
			</thead>
			@foreach($movies as $movie)
			{{-- @if($movies->$state == 1) --}}
			<tbody>
				<td>{{$movie->name}}</td>
				<td>{{$movie->category}} {{$movie->category2}}</td>
				<td>{{$movie->duration}}</td>
				<td>
					<p style ="display: none;"> {!! Form::label('{{$movie->id}}', 'Seleccionar * :') !!} </p>
					<p ><input name="{{$movie->id}}" id="{{$movie->id}}" value="{{$movie->id}}" type="checkbox" onclick="UpdateDuration('{{$movie->id}}', '{{$movie->name}}', '{{$movie->duration}}')" ></p>
				</td>
			</tbody>
			{{-- @endif --}}
			@endforeach
		</table>
		{!!$movies->render()!!}
		{!! Form::submit('Agregar',['class' =>'btn btn-primary', 'value' =>'validate']) !!}
		{!! Form::close() !!}
	</div>
	<div class="col-md-4">
		<H5 id="start_tittle" style="margin-top: 0">Agregados</H3>
			<H3 id="end_tittle" style="margin-top: 0">Agregados</H3>
			<div id="time"></div>

			<table id="data-table"></table>

			<br />
		{{-- 	<button id="btn-load">Load List 1</button>&nbsp;
			<button id="btn-update">Load List 2</button>&nbsp;
			<button id="btn-append">Append List 1</button>&nbsp;
			<button id="btn-clear">Clear List</button>&nbsp; --}}

		</div>
	</div>

	@endif
	@endsection