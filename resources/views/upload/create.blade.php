@if (!Auth::guest())
@if ((Auth::user()->tipo == "profesor") || (Auth::user()->tipo == "alumno") || (Auth::user()->tipo == "administrador"))
@extends('layouts.appTrue')
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

<div>

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
    <div class = "form-group col-md-12">
        <div class="colums">
            {!! Form::label('name', 'Nombre * :') !!}
            {!! Form::text('name', null, ['class'=> 'form-control', 'required'=> '']) !!}
            <br>
            <div class="alert alert-danger col-md-6" id="nameValidation" style="display: none">
            </div>
        </div>
        {{--  <label id="nameValidation" style="display: none;"></label> --}}
    </div>
    <div class = "form-group col-md-12">
        <div class="colums">
            {!! Form::label('description', 'Descripción * :') !!}
            {!! Form::textarea('description', null, ['class'=> 'form-control', 'required'=> '']) !!}
            <br>
            <div class="alert alert-danger col-md-6" id="descriptionValidation" style="display: none">
            </div>
        </div>
    </div>

    <div class = "form-group col-md-12">
        {!! Form::label('language', 'Idioma * :') !!}
        {!! Form::select('language', Config::get('enums.languages'), ['required'=> '', 'data-parsley-mincheck'=> 1]) !!}
    </div>

    <div class = "form-group col-md-12">
        {!! Form::label('imageRef', 'Imagen Referencial de Video * :') !!}
        <div class = "form-group col-md-12" style="display:none;">
            {!! Form::text('imageRef', null, ['class'=> 'form-control']) !!}
        </div>
        <div id="filelistImage">Su navegador no tiene soporte para HTML5.</div>
        <br />
        <div id="container">
            <button class="button" id="pickimage" href="javascript:;">Seleccionar Imagen</button> 
            <button class="button" id="uploadimage" href="javascript:;">Subir Imagen</button>
        </div>
        <div class="alert alert-danger col-md-6" id="imageValidation" style="display: none"></div>
    </div>

    <div class = "form-group col-md-12">
        {!! Form::label('url', 'Video * :') !!}
        <div class = "form-group col-md-12" style="display:none;">
            {!! Form::text('url', null, ['class'=> 'form-control']) !!}
        </div>
        <div id="filelistVideo">Su navegador no tiene soporte para HTML5.</div>
        <br />
        <div id="container">
            <button class="button" id="pickvideo" href="javascript:;">Seleccionar Video</button> 
            <button class="button" id="uploadvideo" href="javascript:;">Subir Video</button>
        </div>
        <div class="alert alert-danger col-md-6" id="videoValidation" style="display: none"></div>
    </div>

            <div class = "form-group col-md-12">
                {!! Form::label('cant_sub', 'Cantidad de Subtitulos:') !!}
                <input id="cant_sub" value="0" type="number" min="0" max="5" class="form-control">
                <div id="result"></div>
            </div>
            <div id="subtittle_1" style ="display: none;">
                <label>Subtitulo 1</label>
                <div class = "form-group col-md-12">
                    {!! Form::label('language_1', 'Idioma * :') !!}
                    {!! Form::select('language_1', Config::get('enums.languages'), ['required'=> '', 'data-parsley-mincheck'=> 1]) !!}
                </div>
                <div class = "form-group col-md-12" >
                    {!! Form::label('subtitle_1', 'Subtitulos:') !!}
                    {!! Form::file('subtitle_1') !!}
                </div>
            </div>
            <div id="subtittle_2" style ="display: none;">
                <label>Subtitulo 2</label>
                <div class = "form-group col-md-12">
                    {!! Form::label('language_2', 'Idioma * :') !!}
                    {!! Form::select('language_2', Config::get('enums.languages'), ['required'=> '', 'data-parsley-mincheck'=> 1]) !!}
                </div>
                <div class = "form-group col-md-12" >
                    {!! Form::label('subtitle_2', 'Subtitulos:') !!}
                    {!! Form::file('subtitle_2') !!}
                </div>
            </div>
            <div id="subtittle_3" style ="display: none;">
                <label>Subtitulo 3</label>
                <div class = "form-group col-md-12">
                    {!! Form::label('language_3', 'Idioma * :') !!}
                    {!! Form::select('language_3', Config::get('enums.languages'), ['required'=> '', 'data-parsley-mincheck'=> 1]) !!}
                </div>
                <div class = "form-group col-md-12" >
                    {!! Form::label('subtitle_3', 'Subtitulos:') !!}
                    {!! Form::file('subtitle_3') !!}
                </div>
            </div>
            <div id="subtittle_4" style ="display: none;">
                <label>Subtitulo 4</label>
                <div class = "form-group col-md-12">
                    {!! Form::label('language_4', 'Idioma * :') !!}
                    {!! Form::select('language_4', Config::get('enums.languages'), ['required'=> '', 'data-parsley-mincheck'=> 1]) !!}
                </div>
                <div class = "form-group col-md-12" >
                    {!! Form::label('subtitle_4', 'Subtitulos:') !!}
                    {!! Form::file('subtitle_4') !!}
                </div>
            </div>
            <div id="subtittle_5" style ="display: none;">
                <label>Subtitulo 5</label>
                <div class = "form-group col-md-12">
                    {!! Form::label('language_5', 'Idioma * :') !!}
                    {!! Form::select('language_5', Config::get('enums.languages'), ['required'=> '', 'data-parsley-mincheck'=> 1]) !!}
                </div>
                <div class = "form-group col-md-12" >
                    {!! Form::label('subtitle_5', 'Subtitulos:') !!}
                    {!! Form::file('subtitle_5') !!}
                </div>
            </div>
            


            {{-- <div class = "form-group col-md-12">
                {!! Form::label('trailer', 'Trailer * :') !!}
                {!! Form::file('trailer', ['required'=> '']) !!}
            </div> --}}
        <div class = "form-group col-md-12">
            {!! Form::label('trailer', 'Trailer * :') !!}
            <div class = "form-group col-md-12" style="display:none;">
                {!! Form::text('trailer', null, ['class'=> 'form-control']) !!}
            </div>
            <div id="filelistTrailer">Su navegador no tiene soporte para HTML5.</div>
            <br />
            <div id="container">
                <button class="button" id="picktrailer" href="javascript:;">Seleccionar Trailer</button> 
                <button class="button" id="uploadtrailer" href="javascript:;">Subir Trailer</button>
            </div>
            <div class="alert alert-danger col-md-6" id="trailerValidation" style="display: none"></div>
        </div>

            <div class = "form-group col-md-12">
                {!! Form::label('trailer_subtitle', 'Subtitulos de Trailer:') !!}
                {!! Form::file('trailer_subtitle') !!}
            </div>

            <div class = "form-group col-md-12">
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
            <div class="alert alert-danger col-md-6" id="categoryValidation" style="display: none">
            </div>

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

            <div class="alert alert-danger col-md-6" id="genreValidation" style="display: none">
            </div>

            <div class = "form-group col-md-12">
                {!! Form::label('shooting_format', 'Formato de Rodaje * :') !!}
                {!!Form::select('shooting_format', Config::get('enums.shooting_format_types'))!!}
            </div>

            <div class = "form-group col-md-12">
                {!! Form::label('creation_date', 'Fecha Creación * :') !!}
                <input type="text" id="creation_date" name="creation_date" class="form-control">

                <div class="alert alert-danger col-md-6" id="dateValidation" style="display: none">
                </div>

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

          <div class = "form-group col-md-12">
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

        <div class = "form-group col-md-12">
            <div class="colums">
                {!! Form::label('direction', 'Dirección * :') !!}
                {!! Form::text('direction', null, ['class'=> 'form-control', 'required'=> '']) !!}
                <br>
                <div class="alert alert-danger col-md-6" id="directionValidation" style="display: none">
                </div>
            </div>
            <br>
            <div class = "form-group col-md-12">
                <div class="colums">
                    {!! Form::label('direction_assistant', 'Asistente de Dirección:') !!}
                    {!! Form::text('direction_assistant', null, ['class'=> 'form-control']) !!}
                </div>
            </div>

            <div class = "form-group col-md-12">
                {!! Form::label('casting', 'Casting:') !!}
                {!! Form::text('casting', null, ['class'=> 'form-control']) !!}
            </div>

            <div class = "form-group col-md-12">
                {!! Form::label('continuista', 'Continuista:') !!}
                {!! Form::text('continuista', null, ['class'=> 'form-control']) !!}
            </div>

            <div class = "form-group col-md-12">
                <div class="colums">
                    {!! Form::label('script', 'Guión * :') !!}
                    {!! Form::text('script', null, ['class'=> 'form-control', 'required'=> '']) !!}
                    <br>
                    <div class="alert alert-danger col-md-6" id="scriptValidation" style="display: none">
                    </div>
                </div>
            </div>

            <div class = "form-group col-md-12">
                <div class="colums">
                    {!! Form::label('production', 'Producción * :') !!}
                    {!! Form::text('production', null, ['class'=> 'form-control', 'required'=> '']) !!}
                    <br>
                    <div class="alert alert-danger col-md-6" id="productionValidation" style="display: none">
                    </div>
                </div>
            </div>

            <div class = "form-group col-md-12">
                <div class="colums">
                    {!! Form::label('production_assistant', 'Asistente de Produccion * :') !!}
                    {!! Form::text('production_assistant', null, ['class'=> 'form-control', 'required'=> '']) !!}
                    <br>
                    <div class="alert alert-danger col-md-6" id="AsisProductionValidation" style="display: none">
                    </div>
                </div>
            </div>
            <br>
            <div class = "form-group col-md-12">
                {!! Form::label('photografic_direction', 'Dirección de Fotografia:') !!}
                {!! Form::text('photografic_direction', null, ['class'=> 'form-control']) !!}
            </div>

            <div class = "form-group col-md-12">
                <div class="colums">
                    {!! Form::label('camara', 'Camara * :') !!}
                    {!! Form::text('camara', null, ['class'=> 'form-control', 'required'=> '']) !!}
                    <br>
                    <div class="alert alert-danger col-md-6" id="camaraValidation" style="display: none">
                    </div>
                </div>
            </div>
            <br>
            <div class = "form-group col-md-12">
                {!! Form::label('camara_assistant', 'Asistente de Camara:') !!}
                {!! Form::text('camara_assistant', null, ['class'=> 'form-control']) !!}
            </div>

            <div class = "form-group col-md-12">
                {!! Form::label('art_direction', 'Direccion de Arte:') !!}
                {!! Form::text('art_direction', null, ['class'=> 'form-control']) !!}
            </div>

            <div class = "form-group col-md-12">
                <div class="colums">
                    {!! Form::label('sonorous_register', 'Registro Sonoro * :') !!}
                    {!! Form::text('sonorous_register', null, ['class'=> 'form-control', 'required'=> '']) !!}
                    <br>
                    <div class="alert alert-danger col-md-6" id="sonorousValidation" style="display: none">
                    </div>
                </div>
            </div>

            <div class = "form-group col-md-12">
                <div class="colums">
                    {!! Form::label('mounting', 'Montaje * :') !!}
                    {!! Form::text('mounting', null, ['class'=> 'form-control', 'required'=> '']) !!}
                    <br>
                    <div class="alert alert-danger col-md-6" id="mountingValidation" style="display: none">
                    </div>
                </div>
            </div>

            <div class = "form-group col-md-12">
                <div class="colums">
                    {!! Form::label('image_postproduction', 'Post-produccion de Imagen * :') !!}
                    {!! Form::text('image_postproduction', null, ['class'=> 'form-control', 'required'=> '']) !!}
                    <br>
                    <div class="alert alert-danger col-md-6" id="imgValidation" style="display: none">
                    </div>
                </div>
            </div>

            <div class = "form-group col-md-12">
                <div class="colums">
                    {!! Form::label('sound_postproduction', 'Post-produccion de Sonido * :') !!}
                    {!! Form::text('sound_postproduction', null, ['class'=> 'form-control', 'required'=> '']) !!}
                    <br>
                    <div class="alert alert-danger col-md-6" id="soundValidation" style="display: none">
                    </div>
                </div>
            </div>
            <br>
            <div class = "form-group col-md-12">
                {!! Form::label('catering', 'Catering:') !!}
                {!! Form::text('catering', null, ['class'=> 'form-control']) !!}
            </div>

            <div class = "form-group col-md-12">
                {!! Form::label('music', 'Música:') !!}
                {!! Form::text('music', null, ['class'=> 'form-control']) !!}
            </div>

            <div class = "form-group col-md-12">
                <div class="colums">
                    {!! Form::label('actors', 'Actores * :') !!}
                    {!! Form::text('actors', null, ['class'=> 'form-control', 'required'=> '']) !!}
                    <br>
                    <div class="alert alert-danger col-md-6" id="actorsValidation" style="display: none">
                    </div>
                </div>
            </div>
            {!! Form::submit('Registrar',['class' =>'btn btn-primary disabled sendButton', 'value' =>'validate']) !!}
            {!! Form::close() !!}
        </div>
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
        <script src="assets/vendor/parsleyjs/dist/parsley.min.js"></script>
        <script type="text/javascript" src="assets/vendor/parsleyjs/dist/i18n/es.js"></script>

        <script type="text/javascript" src="js/plupload.full.min.js"></script>


        <script type="text/javascript">
            var j = jQuery.noConflict();
            var valid = 0;
            j('#name').on('input',function(e){
                var name = j('#name').val();
                var BLIDRegExpression = /^[a-zA-Z0-9\ \Ñ\ñ\u00C0-\u017F\-\_\(\)\[\]]+$/;
                if(name.length == 0){
                    document.getElementById("nameValidation").style.display = "inline";
                    document.getElementById("nameValidation").innerHTML = 'Campo Obligatorio';
                    $(".sendButton").attr('class', 'btn btn-primary disabled sendButton');
                }else if (!BLIDRegExpression.test(name)) {
                    document.getElementById("nameValidation").style.display = "inline";
                    document.getElementById("nameValidation").innerHTML = 'El Campo Contiene Caracteres Invalidos';
                    $(".sendButton").attr('class', 'btn btn-primary disabled sendButton');
                }else{
                    document.getElementById("nameValidation").style.display = "none";
                    $(".sendButton").attr('class', 'btn btn-primary active sendButton');
                }

            });
            j('#description').on('input',function(e){
                var description = j('#description').val();
                var BLIDRegExpression = /^[a-zA-Z0-9\ \Ñ\ñ\u00C0-\u017F\-\_\(\)\[\]]+$/;
                if(description.length == 0){
                    document.getElementById("descriptionValidation").style.display = "inline";
                    document.getElementById("descriptionValidation").innerHTML = 'Campo Obligatorio';
                    $(".sendButton").attr('class', 'btn btn-primary disabled sendButton');
                }else if (!BLIDRegExpression.test(description)) {
                    document.getElementById("descriptionValidation").style.display = "inline";
                    document.getElementById("descriptionValidation").innerHTML = 'El Campo Contiene Caracteres Invalidos';
                    $(".sendButton").attr('class', 'btn btn-primary disabled sendButton');
                }else{
                    document.getElementById("descriptionValidation").style.display = "none";
                    $(".sendButton").attr('class', 'btn btn-primary active sendButton');
                }
            });
            j('#creation_date').on('input',function(e){
                var creation_date = j('#creation_date').val();
                var BLIDRegExpression = /^[a-zA-Z0-9\ \Ñ\ñ\u00C0-\u017F\-\_\(\)\[\]]+$/;
                if(creation_date.length == 0){
                    document.getElementById("dateValidation").style.display = "inline";
                    document.getElementById("dateValidation").innerHTML = 'Campo Obligatorio';
                    $(".sendButton").attr('class', 'btn btn-primary disabled sendButton');
                }else{
                    document.getElementById("dateValidation").style.display = "none";
                    $(".sendButton").attr('class', 'btn btn-primary active sendButton');
                }
            });
            j('#direction').on('input',function(e){
                var direction = j('#direction').val();
                var BLIDRegExpression = /^[a-zA-Z\ \Ñ\ñ\u00C0-\u017F]+$/;
                if(direction.length == 0){
                    document.getElementById("directionValidation").style.display = "inline";
                    document.getElementById("directionValidation").innerHTML = 'Campo Obligatorio';
                    $(".sendButton").attr('class', 'btn btn-primary disabled sendButton');
                }else if (!BLIDRegExpression.test(direction)) {
                    document.getElementById("directionValidation").style.display = "inline";
                    document.getElementById("directionValidation").innerHTML = 'El Campo Contiene Caracteres Invalidos';
                    $(".sendButton").attr('class', 'btn btn-primary disabled sendButton');
                }else{
                    document.getElementById("directionValidation").style.display = "none";
                    $(".sendButton").attr('class', 'btn btn-primary active sendButton');
                }
            });
            j('#script').on('input',function(e){
                var script = j('#script').val();
                var BLIDRegExpression = /^[a-zA-Z\ \Ñ\ñ\u00C0-\u017F]+$/;
                if(script.length == 0){
                    document.getElementById("scriptValidation").style.display = "inline";
                    document.getElementById("scriptValidation").innerHTML = 'Campo Obligatorio';
                    $(".sendButton").attr('class', 'btn btn-primary disabled sendButton');
                }else if (!BLIDRegExpression.test(script)) {
                    document.getElementById("scriptValidation").style.display = "inline";
                    document.getElementById("scriptValidation").innerHTML = 'El Campo Contiene Caracteres Invalidos';
                    $(".sendButton").attr('class', 'btn btn-primary disabled sendButton');
                }else{
                    document.getElementById("scriptValidation").style.display = "none";
                    $(".sendButton").attr('class', 'btn btn-primary active sendButton');
                }
            });
            j('#production').on('input',function(e){
                var production = j('#production').val();
                var BLIDRegExpression = /^[a-zA-Z\ \Ñ\ñ\u00C0-\u017F]+$/;
                if(production.length == 0){
                    document.getElementById("productionValidation").style.display = "inline";
                    document.getElementById("productionValidation").innerHTML = 'Campo Obligatorio';
                    $(".sendButton").attr('class', 'btn btn-primary disabled sendButton');
                }else if (!BLIDRegExpression.test(production)) {
                    document.getElementById("productionValidation").style.display = "inline";
                    document.getElementById("productionValidation").innerHTML = 'El Campo Contiene Caracteres Invalidos';
                    $(".sendButton").attr('class', 'btn btn-primary disabled sendButton');
                }else{
                    document.getElementById("productionValidation").style.display = "none";
                    $(".sendButton").attr('class', 'btn btn-primary active sendButton');
                }
            });
            j('#production_assistant').on('input',function(e){
                var production_assistant = j('#production_assistant').val();
                var BLIDRegExpression = /^[a-zA-Z\ \Ñ\ñ\u00C0-\u017F]+$/;
                if(production_assistant.length == 0){
                    document.getElementById("AsisProductionValidation").style.display = "inline";
                    document.getElementById("AsisProductionValidation").innerHTML = 'Campo Obligatorio';
                    $(".sendButton").attr('class', 'btn btn-primary disabled sendButton');
                }else if (!BLIDRegExpression.test(production_assistant)) {
                    document.getElementById("AsisProductionValidation").style.display = "inline";
                    document.getElementById("AsisProductionValidation").innerHTML = 'El Campo Contiene Caracteres Invalidos';
                    $(".sendButton").attr('class', 'btn btn-primary disabled sendButton');
                }else{
                    document.getElementById("AsisProductionValidation").style.display = "none";
                    $(".sendButton").attr('class', 'btn btn-primary active sendButton');
                }
            });
            j('#camara').on('input',function(e){
                var camara = j('#camara').val();
                var BLIDRegExpression = /^[a-zA-Z\ \Ñ\ñ\u00C0-\u017F]+$/;
                if(camara.length == 0){
                    document.getElementById("camaraValidation").style.display = "inline";
                    document.getElementById("camaraValidation").innerHTML = 'Campo Obligatorio';
                    $(".sendButton").attr('class', 'btn btn-primary disabled sendButton');
                }else if (!BLIDRegExpression.test(camara)) {
                    document.getElementById("camaraValidation").style.display = "inline";
                    document.getElementById("camaraValidation").innerHTML = 'El Campo Contiene Caracteres Invalidos';
                    $(".sendButton").attr('class', 'btn btn-primary disabled sendButton');
                }else{
                    document.getElementById("camaraValidation").style.display = "none";
                    $(".sendButton").attr('class', 'btn btn-primary active sendButton');
                }
            });
            j('#sonorous_register').on('input',function(e){
                var sonorous_register = j('#sonorous_register').val();
                var BLIDRegExpression = /^[a-zA-Z\ \Ñ\ñ\u00C0-\u017F]+$/;
                if(sonorous_register.length == 0){
                    document.getElementById("sonorousValidation").style.display = "inline";
                    document.getElementById("sonorousValidation").innerHTML = 'Campo Obligatorio';
                    $(".sendButton").attr('class', 'btn btn-primary disabled sendButton');
                }else if (!BLIDRegExpression.test(sonorous_register)) {
                    document.getElementById("sonorousValidation").style.display = "inline";
                    document.getElementById("sonorousValidation").innerHTML = 'El Campo Contiene Caracteres Invalidos';
                    $(".sendButton").attr('class', 'btn btn-primary disabled sendButton');
                }else{
                    document.getElementById("sonorousValidation").style.display = "none";
                    $(".sendButton").attr('class', 'btn btn-primary active sendButton');
                }
            });
            j('#mounting').on('input',function(e){
                var mounting = j('#mounting').val();
                var BLIDRegExpression = /^[a-zA-Z\ \Ñ\ñ\u00C0-\u017F]+$/;
                if(mounting.length == 0){
                    document.getElementById("mountingValidation").style.display = "inline";
                    document.getElementById("mountingValidation").innerHTML = 'Campo Obligatorio';
                    $(".sendButton").attr('class', 'btn btn-primary disabled sendButton');
                }else if (!BLIDRegExpression.test(mounting)) {
                    document.getElementById("mountingValidation").style.display = "inline";
                    document.getElementById("mountingValidation").innerHTML = 'El Campo Contiene Caracteres Invalidos';
                    $(".sendButton").attr('class', 'btn btn-primary disabled sendButton');
                }else{
                    document.getElementById("mountingValidation").style.display = "none";
                    $(".sendButton").attr('class', 'btn btn-primary active sendButton');
                }
            });
            j('#image_postproduction').on('input',function(e){
                var image_postproduction = j('#image_postproduction').val();
                var BLIDRegExpression = /^[a-zA-Z\ \Ñ\ñ\u00C0-\u017F]+$/;
                if(image_postproduction.length == 0){
                    document.getElementById("imgValidation").style.display = "inline";
                    document.getElementById("imgValidation").innerHTML = 'Campo Obligatorio';
                    $(".sendButton").attr('class', 'btn btn-primary disabled sendButton');
                }else if (!BLIDRegExpression.test(image_postproduction)) {
                    document.getElementById("imgValidation").style.display = "inline";
                    document.getElementById("imgValidation").innerHTML = 'El Campo Contiene Caracteres Invalidos';
                    $(".sendButton").attr('class', 'btn btn-primary disabled sendButton');
                }else{
                    document.getElementById("imgValidation").style.display = "none";
                    $(".sendButton").attr('class', 'btn btn-primary active sendButton');
                }
            });
            j('#sound_postproduction').on('input',function(e){
                var sound_postproduction = j('#sound_postproduction').val();
                var BLIDRegExpression = /^[a-zA-Z\ \Ñ\ñ\u00C0-\u017F]+$/;
                if(sound_postproduction.length == 0){
                    document.getElementById("soundValidation").style.display = "inline";
                    document.getElementById("soundValidation").innerHTML = 'Campo Obligatorio';
                    $(".sendButton").attr('class', 'btn btn-primary disabled sendButton');
                }else if (!BLIDRegExpression.test(sound_postproduction)) {
                    document.getElementById("soundValidation").style.display = "inline";
                    document.getElementById("soundValidation").innerHTML = 'El Campo Contiene Caracteres Invalidos';
                    $(".sendButton").attr('class', 'btn btn-primary disabled sendButton');
                }else{
                    document.getElementById("soundValidation").style.display = "none";
                    $(".sendButton").attr('class', 'btn btn-primary active sendButton');
                }
            });
            j('#actors').on('input',function(e){
                var actors = j('#actors').val();
                var BLIDRegExpression = /^[a-zA-Z\ \Ñ\ñ\u00C0-\u017F]+$/;
                if(actors.length == 0){
                    document.getElementById("actorsValidation").style.display = "inline";
                    document.getElementById("actorsValidation").innerHTML = 'Campo Obligatorio';
                    $(".sendButton").attr('class', 'btn btn-primary disabled sendButton');
                }else if (!BLIDRegExpression.test(actors)) {
                    document.getElementById("actorsValidation").style.display = "inline";
                    document.getElementById("actorsValidation").innerHTML = 'El Campo Contiene Caracteres Invalidos';
                    $(".sendButton").attr('class', 'btn btn-primary disabled sendButton');
                }else{
                    document.getElementById("actorsValidation").style.display = "none";
                    $(".sendButton").attr('class', 'btn btn-primary active sendButton');
                }
            });
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
		// Custom example logic
        var uploadVideo = false;
        var uploaderVideo = new plupload.Uploader({
         runtimes : 'html5',
		    browse_button: 'pickvideo', // this can be an id of a DOM element or the DOM element itself
		    url: '/uploadVideo.php',
		    chunk_size: '200kb',
		    max_retries: 3,
		    filters : {
                max_file_size : '10000mb',
                mime_types: [
                {title : "Video files", extensions : "mp4,webm,avi,ogv,mkv"}
                ]
            },

            init: {
                PostInit: function() {
                   document.getElementById('filelistVideo').innerHTML = '';

                   document.getElementById('uploadvideo').onclick = function() {
                      uploaderVideo.start();
                      return false;
                  };
              },

              FilesAdded: function(up, files) {
                if (uploadVideo == false){
                   plupload.each(files, function(file) {
                    while (up.files.length > 1) {
                        up.removeFile(up.files[0]);
                    }
                    document.getElementById('filelistVideo').innerHTML = '<div id="' + file.id + '">' + file.name + ' (' + plupload.formatSize(file.size) + ') <b></b></div>';
                    document.getElementById('url').value = file.name;
                    alert("valor: " + document.getElementById('url').value);
                });
               }else{
                alert("No se puede agregar mas videos");
            }
        },

        UploadProgress: function(up, file) {
           document.getElementById(file.id).getElementsByTagName('b')[0].innerHTML = '<span>' + file.percent + "%</span>";
           if(file.percent == 100){
            uploadVideo = true;
        }
    },

    Error: function(up, err) {
        alert("Error: " + err.code + ": " + err.message);
					//document.getElementById('console').appendChild(document.createTextNode("\nError #" + err.code + ": " + err.message));
				}
			}
		});

        uploaderVideo.init();
    </script>

    <script type="text/javascript">
        // Custom example logic
        var uploadImg = false;
        var uploaderImage = new plupload.Uploader({
         runtimes : 'html5',
            browse_button: 'pickimage', // this can be an id of a DOM element or the DOM element itself
            url: '/uploadImage.php',
            chunk_size: '200kb',
            max_retries: 3,
            filters : {
                max_file_size : '100mb',
                mime_types: [
                {title : "Image files", extensions : "png,jpg,jpeg"}
                ]
            },

            init: {
                PostInit: function() {
                   document.getElementById('filelistImage').innerHTML = '';

                   document.getElementById('uploadimage').onclick = function() {
                      uploaderImage.start();
                      return false;
                  };
              },

              FilesAdded: function(up, files) {
                if (uploadImg == false){
                   plupload.each(files, function(file) {
                    while (up.files.length > 1) {
                        up.removeFile(up.files[0]);
                    }
                    document.getElementById('filelistImage').innerHTML = '<div id="' + file.id + '">' + file.name + ' (' + plupload.formatSize(file.size) + ') <b></b></div>';
                    document.getElementById('imageRef').value = file.name;
                    alert("valor: " + document.getElementById('imageRef').value);
                });
               }else{
                alert("No se puede agregar mas imagenes");
            }
        },

        UploadProgress: function(up, file) {
           document.getElementById(file.id).getElementsByTagName('b')[0].innerHTML = '<span>' + file.percent + "%</span>";
           if(file.percent == 100){
            uploadImg = true;
        }
    },

    Error: function(up, err) {
        alert("Error: " + err.code + ": " + err.message);
                    //document.getElementById('console').appendChild(document.createTextNode("\nError #" + err.code + ": " + err.message));
                }
            }
        });

        uploaderImage.init();
    </script>

    <script type="text/javascript">
        // Custom example logic
        var uploadTrailer = false;
        var uploaderTrailer = new plupload.Uploader({
         runtimes : 'html5',
            browse_button: 'picktrailer', // this can be an id of a DOM element or the DOM element itself
            url: '/uploadTrailer.php',
            chunk_size: '200kb',
            max_retries: 3,
            filters : {
                max_file_size : '100mb',
                mime_types: [
                {title : "Video files", extensions : "mp4,webm,avi,ogv,mkv"}
                ]
            },

            init: {
                PostInit: function() {
                   document.getElementById('filelistTrailer').innerHTML = '';

                   document.getElementById('uploadtrailer').onclick = function() {
                      uploaderTrailer.start();
                      return false;
                  };
              },

              FilesAdded: function(up, files) {
                if (uploadTrailer == false){
                   plupload.each(files, function(file) {
                    while (up.files.length > 1) {
                        up.removeFile(up.files[0]);
                    }
                    document.getElementById('filelistTrailer').innerHTML = '<div id="' + file.id + '">' + file.name + ' (' + plupload.formatSize(file.size) + ') <b></b></div>';
                    document.getElementById('imageRef').value = file.name;
                    alert("valor: " + document.getElementById('imageRef').value);
                });
               }else{
                alert("No se puede agregar mas imagenes");
            }
        },

        UploadProgress: function(up, file) {
           document.getElementById(file.id).getElementsByTagName('b')[0].innerHTML = '<span>' + file.percent + "%</span>";
           if(file.percent == 100){
            uploadTrailer = true;
        }
    },

    Error: function(up, err) {
        alert("Error: " + err.code + ": " + err.message);
                    //document.getElementById('console').appendChild(document.createTextNode("\nError #" + err.code + ": " + err.message));
                }
            }
        });

        uploaderTrailer.init();
    </script>

    <script type="text/javascript" src="/js/i18n/es.js"></script>
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