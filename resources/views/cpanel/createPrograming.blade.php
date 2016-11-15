@extends('layouts.panelprofesor')
@section('content')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
  <script type="text/javascript" src="/assets/vendor/moment/min/moment.min.js"></script>
  <script type="text/javascript" src="/js/locale/es.js"></script>
  <script type="text/javascript" src="/assets/vendor/eonasdan-bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js"></script>


@if (count($movies) === 0)
... No existen videos disponibles
@elseif (count($movies) >= 1)

<H3 style="margin-top: 0">Crear Lista de Reproducción</H3>

{!! Form::open(['id' => 'newPlaylist', 'route' =>'programing.store', 'method'=>'POST', 'data-parsley-validate'=>'' ]) !!}
<div class = "form-group">
    <div class='input-group date' id='datetimepicker2'>
            <input id='start' type='text' class="form-control" />
            <span class="input-group-addon">
            <span class="glyphicon glyphicon-calendar"></span>
        </span>
    </div>
</div>
<script type="text/javascript">
            $(function () {
                $('#datetimepicker2').datetimepicker({
                    locale: 'es',
                    format: 'LT'
                });
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
	function toSeconds(s) {
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
	}
</script>

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
    		<p ><input name="{{$movie->id}}" id="{{$movie->id}}" value="{{$movie->id}}" type="checkbox" onclick="UpdateDuration('{{$movie->id}}', '{{$movie->duration}}')" ></p>
		</td>
	</tbody>
	{{-- @endif --}}
	@endforeach
</table>
{!!$movies->render()!!}
{!! Form::submit('Agregar',['class' =>'btn btn-primary', 'value' =>'validate']) !!}
{!! Form::close() !!}
@endif
@endsection