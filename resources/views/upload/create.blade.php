@if (!Auth::guest())
@if ((Auth::user()->tipo == "profesor") || (Auth::user()->tipo == "alumno") || (Auth::user()->tipo == "administrador"))
@extends('layouts.app')
@section('content')
<style>
    body{
        font-family: 'Roboto', sans-serif !important;
    }
</style>

<link rel="stylesheet" href="http://code.jquery.com/ui/1.10.1/themes/base/jquery-ui.css" />
<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
<script src="http://code.jquery.com/ui/1.10.1/jquery-ui.js"></script>

<script>
    $.datepicker.regional['es'] = {
        closeText: 'Cerrar',
        prevText: '<Ant',
        nextText: 'Sig>',
        currentText: 'Hoy',
        monthNames: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
        monthNamesShort: ['Ene','Feb','Mar','Abr', 'May','Jun','Jul','Ago','Sep', 'Oct','Nov','Dic'],
        dayNames: ['Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado'],
        dayNamesShort: ['Dom','Lun','Mar','Mié','Juv','Vie','Sáb'],
        dayNamesMin: ['Do','Lu','Ma','Mi','Ju','Vi','Sá'],
        weekHeader: 'Sm',
        dateFormat: 'yy-mm-dd',
        firstDay: 1,
        isRTL: false,
        showMonthAfterYear: false,
        yearSuffix: ''
    };
    $.datepicker.setDefaults($.datepicker.regional['es']);
    $(function () {
        $("#creation_date").datepicker();
    });
   
</script>
<script>
    $( function() {
        $( "#cant_sub" ).on( "change", function() {
            if($("#cant_sub").val() > 5){
                alert("Máximo de 5 subtitulos")
                $("#cant_sub").val(5);
            }else if($("#cant_sub").val() < 0){
                $("#cant_sub").val(0);
            }else if (($("#cant_sub").val() <= 5) && ($("#cant_sub").val() > 0)){
                var subs = $("#cant_sub").val();
                for(var x=1; x<=5; x++){
                    if(x<=subs){
                        document.getElementById("subtittle_" + x).style.display="inline";
                    }else{
                        document.getElementById("subtittle_" + x).style.display="none";
                    }
                }
            }else{
                for(var y=1; y<=5; y++){
                    document.getElementById("subtittle_" + y).style.display="none";
                }
            }
        });
    });
</script>

<h3 style="margin-bottom: 30px;">Subir Video</h3>

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
<div class = "form-group">
    {!! Form::label('name', 'Nombre * :') !!}
    {!! Form::text('name', null, ['class'=> 'form-control', 'required'=> '']) !!}
</div>
<div class = "form-group">
    {!! Form::label('description', 'Descripción * :') !!}
    {!! Form::textarea('description', null, ['class'=> 'form-control', 'required'=> '']) !!}
</div>

<div class = "form-group">
    {!! Form::label('language', 'Idioma * :') !!}
    {!! Form::select('language', Config::get('enums.languages'), ['required'=> '', 'data-parsley-mincheck'=> 1]) !!}
</div>

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
                {!! Form::label('cant_sub', 'Cantidad de Subtitulos:') !!}
                <input id="cant_sub" value="0" type="number" min="0" max="5" class="form-control">
                <div id="result"></div>
            </div>
            <div id="subtittle_1" style ="display: none;">
                <label>Subtitulo 1</label>
                <div class = "form-group">
                    {!! Form::label('language_1', 'Idioma * :') !!}
                    {!! Form::select('language_1', Config::get('enums.languages'), ['required'=> '', 'data-parsley-mincheck'=> 1]) !!}
                </div>
                <div class = "form-group" >
                    {!! Form::label('subtitle_1', 'Subtitulos:') !!}
                    {!! Form::file('subtitle_1') !!}
                </div>
            </div>
            <div id="subtittle_2" style ="display: none;">
                <label>Subtitulo 2</label>
                <div class = "form-group">
                    {!! Form::label('language_2', 'Idioma * :') !!}
                    {!! Form::select('language_2', Config::get('enums.languages'), ['required'=> '', 'data-parsley-mincheck'=> 1]) !!}
                </div>
                <div class = "form-group" >
                    {!! Form::label('subtitle_2', 'Subtitulos:') !!}
                    {!! Form::file('subtitle_2') !!}
                </div>
            </div>
            <div id="subtittle_3" style ="display: none;">
                <label>Subtitulo 3</label>
                <div class = "form-group">
                    {!! Form::label('language_3', 'Idioma * :') !!}
                    {!! Form::select('language_3', Config::get('enums.languages'), ['required'=> '', 'data-parsley-mincheck'=> 1]) !!}
                </div>
                <div class = "form-group" >
                    {!! Form::label('subtitle_3', 'Subtitulos:') !!}
                    {!! Form::file('subtitle_3') !!}
                </div>
            </div>
            <div id="subtittle_4" style ="display: none;">
                <label>Subtitulo 4</label>
                <div class = "form-group">
                    {!! Form::label('language_4', 'Idioma * :') !!}
                    {!! Form::select('language_4', Config::get('enums.languages'), ['required'=> '', 'data-parsley-mincheck'=> 1]) !!}
                </div>
                <div class = "form-group" >
                    {!! Form::label('subtitle_4', 'Subtitulos:') !!}
                    {!! Form::file('subtitle_4') !!}
                </div>
            </div>
            <div id="subtittle_5" style ="display: none;">
                <label>Subtitulo 5</label>
                <div class = "form-group">
                    {!! Form::label('language_5', 'Idioma * :') !!}
                    {!! Form::select('language_5', Config::get('enums.languages'), ['required'=> '', 'data-parsley-mincheck'=> 1]) !!}
                </div>
                <div class = "form-group" >
                    {!! Form::label('subtitle_5', 'Subtitulos:') !!}
                    {!! Form::file('subtitle_5') !!}
                </div>
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
                <input type="text" id="creation_date" name="creation_date" class="form-control">

                {{-- <p>Format options:<br>
                  <input type="text" id="format" name="format" value="yy-mm-dd"> 
                   <select id="format">
                    <option value="mm/dd/yy">Default - mm/dd/yy</option>
                    <option value="yy-mm-dd">ISO 8601 - yy-mm-dd</option>
                    <option value="d M, y">Short - d M, y</option>
                    <option value="d MM, y">Medium - d MM, y</option>
                    <option value="DD, d MM, yy">Full - DD, d MM, yy</option>
                    <option value="&apos;day&apos; d &apos;of&apos; MM &apos;in the year&apos; yy">With text - 'day' d 'of' MM 'in the year' yy</option>
                  </select> 
              </p> --}}
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