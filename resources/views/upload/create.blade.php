@extends('layouts.app')

@section('content')
<link href='assets/vendor/parsleyjs/src/parsley.css' rel='stylesheet' />
<style>
    body{
        font-family: 'Roboto', sans-serif !important;
    }
</style>
@if (Auth::guest())
<script type="text/javascript">
    window.location = "/";//here double curly bracket
</script>
@else
    @if ((Auth::user()->tipo != "profesor") && (Auth::user()->tipo != "alumno"))

    <script type="text/javascript">
        window.location = "/";//here double curly bracket
    </script>
    @endif
@endif

<H3 style="margin-top: 0">Subir Video</H3>

{!! Form::open(['id' => 'newVideo', 'route' =>'upload.store', 'method'=>'POST', 'files'=> true, 'data-parsley-validate'=>'' ]) !!}

<div class = "form-group" style ="display: none;">
    {!! Form::label('usuario_id', 'usuario_id:') !!}
    {!! Form::text('usuario_id', Auth::user()->id) !!}
</div>

<div class = "form-group" style ="display: none;">
    {!! Form::label('state', 'State:') !!}
    @if (Auth::user()->tipo == "alumno")
        {!! Form::text('state', 3) !!}
    @else
        {!! Form::text('state', 1) !!}
    @endif
</div>

    {!! Form::label('name', 'Nombre * :') !!}
    {!! Form::text('name', null, ['class'=> 'form-control', 'required'=> '']) !!}

    {!! Form::label('description', 'Descripción * :') !!}
    {!! Form::textarea('description', null, ['class'=> 'form-control', 'required'=> '']) !!}

    {!! Form::label('language', 'Idioma * :') !!}
    {!! Form::select('language', Config::get('enums.languages'), ['required'=> '', 'data-parsley-mincheck'=> 1]) !!}

{{-- 
<label for="hobbies">Hobbies (Optional, but 2 minimum):</label>
  <p>
    Skiing <input name="hobbies[]" id="hobby1" value="ski" data-parsley-mincheck="2" type="checkbox"><br>
    Running <input name="hobbies[]" id="hobby2" value="run" type="checkbox"><br>
    Eating <input name="hobbies[]" id="hobby3" value="eat" type="checkbox"><br>
    Sleeping <input name="hobbies[]" id="hobby4" value="sleep" type="checkbox"><br>
    Reading <input name="hobbies[]" id="hobby5" value="read" type="checkbox"><br>
    Coding <input name="hobbies[]" id="hobby6" value="code" type="checkbox"><br>
  </p> --}}
<div class = "form-group">
    {!! Form::label('imageRef', 'Imagen Referencial de Video * :') !!}
    {!! Form::file('imageRef', ['required'=> '']) !!}
</div>

<div class = "form-group">
    {!! Form::label('url', 'Video * :') !!}
    {!! Form::file('url', ['required'=> '']) !!}
</div>

<div class = "form-group">
    {!! Form::label('subtitle', 'Subtitulos:') !!}
    {!! Form::file('subtitle') !!}
</div>

<div class = "form-group">
    {!! Form::label('trailer', 'Trailer * :') !!}
    {!! Form::file('trailer', ['required'=> '']) !!}
</div>

<div class = "form-group">
    {!! Form::label('trailer_subtitle', 'Subtitulos de Trailer:') !!}
    {!! Form::file('trailer_subtitle') !!}
</div>

<div class = "form-group">
    {!! Form::label('asignatura_id', 'Asignatura * :') !!}
    {!! Form::select('asignatura_id', $subject) !!}
</div>


    {!! Form::label('category', 'Categoria * :') !!}


{{-- <input id="category" type="radio" value="mediometraje" name="category" checked="checked" data-parsley-multiple="category">
<input id="genderM" type="radio" required="" value="M" name="gender" data-parsley-multiple="gender">
 --}}
    <p>
        Largometraje <input name="category" id="largometraje" value="largometraje" required="" type="radio">
    </p>
    <p>
        Mediometraje <input name="category" id="mediometraje" value="mediometraje" type="radio">
    </p>
    <p>
        Cortometraje <input name="category" id="cortometraje" value="cortometraje" type="radio">
    </p>

        {!! Form::label('category2', 'Genero * :') !!}

    <p>
        Experimental <input name="category2" id="experimental" value="experimental" required="" type="radio">
    </p>
    <p>
        Ficción: <input name="category2" id="ficcion" value="ficcion" type="radio">
    </p>
    <p>
        Animación <input name="category2" id="animacion" value="animacion" type="radio">
    </p>
    <p>
        Documental <input name="category2" id="documental" value="documental" type="radio">
    </p>

<div class = "form-group">
    {!! Form::label('shooting_format', 'Formato de Rodaje * :') !!}
    {!!Form::select('shooting_format', Config::get('enums.shooting_format_types'))!!}
</div>

<div class = "form-group">
    {!! Form::label('creation_date', 'Fecha Creación * :') !!}
    {!! Form::text('creation_date', null, ['class'=> 'form-control', 'required'=> '']) !!}
</div>

<div class = "form-group">
    {!! Form::label('production_year', 'Año de Produccion * :') !!}
    <select name="production_year">
        <?php
        $years = range(date("Y"), date("Y", strtotime("now - 100 years")));
        foreach($years as $year){
            echo'<option value="'.$year.'">'.$year.'</option>';
        }
        ?>
    </select>
</div>

<div class = "form-group">
    {!! Form::label('direction', 'Dirección * :') !!}
    {!! Form::text('direction', null, ['class'=> 'form-control', 'required'=> '']) !!}
</div>

<div class = "form-group">
    {!! Form::label('direction_assistant', 'Asistente de Dirección:') !!}
    {!! Form::text('direction_assistant', null, ['class'=> 'form-control']) !!}
</div>

<div class = "form-group">
    {!! Form::label('casting', 'Casting:') !!}
    {!! Form::text('casting', null, ['class'=> 'form-control']) !!}
</div>

<div class = "form-group">
    {!! Form::label('continuista', 'Continuista:') !!}
    {!! Form::text('continuista', null, ['class'=> 'form-control']) !!}
</div>

<div class = "form-group">
    {!! Form::label('script', 'Guión * :') !!}
    {!! Form::text('script', null, ['class'=> 'form-control', 'required'=> '']) !!}
</div>

<div class = "form-group">
    {!! Form::label('production', 'Producción * :') !!}
    {!! Form::text('production', null, ['class'=> 'form-control', 'required'=> '']) !!}
</div>

<div class = "form-group">
    {!! Form::label('production_assistant', 'Asistente de Produccion * :') !!}
    {!! Form::text('production_assistant', null, ['class'=> 'form-control', 'required'=> '']) !!}
</div>

<div class = "form-group">
    {!! Form::label('photografic_direction', 'Dirección de Fotografia:') !!}
    {!! Form::text('photografic_direction', null, ['class'=> 'form-control']) !!}
</div>

<div class = "form-group">
    {!! Form::label('camara', 'Camara * :') !!}
    {!! Form::text('camara', null, ['class'=> 'form-control', 'required'=> '']) !!}
</div>

<div class = "form-group">
    {!! Form::label('camara_assistant', 'Asistente de Camara:') !!}
    {!! Form::text('camara_assistant', null, ['class'=> 'form-control']) !!}
</div>

<div class = "form-group">
    {!! Form::label('art_direction', 'Direccion de Arte:') !!}
    {!! Form::text('art_direction', null, ['class'=> 'form-control']) !!}
</div>

<div class = "form-group">
    {!! Form::label('sonorous_register', 'Registro Sonoro * :') !!}
    {!! Form::text('sonorous_register', null, ['class'=> 'form-control', 'required'=> '']) !!}
</div>

<div class = "form-group">
    {!! Form::label('mounting', 'Montaje * :') !!}
    {!! Form::text('mounting', null, ['class'=> 'form-control', 'required'=> '']) !!}
</div>

<div class = "form-group">
    {!! Form::label('image_postproduction', 'Post-produccion de Imagen * :') !!}
    {!! Form::text('image_postproduction', null, ['class'=> 'form-control', 'required'=> '']) !!}
</div>

<div class = "form-group">
    {!! Form::label('sound_postproduction', 'Post-produccion de Sonido * :') !!}
    {!! Form::text('sound_postproduction', null, ['class'=> 'form-control', 'required'=> '']) !!}
</div>

<div class = "form-group">
    {!! Form::label('catering', 'Catering:') !!}
    {!! Form::text('catering', null, ['class'=> 'form-control']) !!}
</div>

<div class = "form-group">
    {!! Form::label('music', 'Música:') !!}
    {!! Form::text('music', null, ['class'=> 'form-control']) !!}
</div>

<div class = "form-group">
    {!! Form::label('actors', 'Actores * :') !!}
    {!! Form::text('actors', null, ['class'=> 'form-control', 'required'=> '']) !!}
</div>
    {!! Form::submit('Registrar',['class' =>'btn btn-primary', 'value' =>'validate']) !!}
    {!! Form::close() !!}

<script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
<script src="assets/vendor/parsleyjs/dist/parsley.min.js"></script>
<script type="text/javascript" src="assets/vendor/parsleyjs/dist/i18n/es.js"></script>


<script type="text/javascript">
var j = jQuery.noConflict();
j(function () {
  j('#demo-form').parsley().on('field:validated', function() {
    var ok = j('.parsley-error').length === 0;
    j('.bs-callout-info').toggleClass('hidden', !ok);
    j('.bs-callout-warning').toggleClass('hidden', ok);
  })
  .on('form:submit', function() {
    return false; // Don't submit form for this demo
  });
});
</script>
@endsection
{{-- <div class = "form-group">
    {!! Form::label('actors', 'Actores:') !!}
    {!! Form::text('actors', null, ['class'=> 'form-control', 'placeholder' => 'Ingresa a los actores']) !!}
</div> --}}
