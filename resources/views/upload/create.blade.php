@extends('layouts.controlPanel')

@section('content')

    @if (!Auth::guest())
        @if ((Auth::user()->tipo == "profesor") || (Auth::user()->tipo == "alumno") || (Auth::user()->tipo == "administrador"))
        <div class="col-sm-10 col-sm-offset-1" style="overflow: hidden; 
    background-color: #f8f8f8;
    border-color: #e7e7e7;">
            <h3 class="orangeAndBoldText" style="margin-bottom: 30px;" align="center">Subir Video</h3>

            <div class="col-sm-offset-2 col-md-8">

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
                        <div class="alert alert-danger col-xs-12" id="nameValidation" style="display: none">
                        </div>
                    </div>
                </div>
                <div class = "form-group col-md-12">
                    <div class="colums">
                        {!! Form::label('description', 'Descripción * :') !!}
                        {!! Form::textarea('description', null, ['class'=> 'form-control', 'required'=> '']) !!}
                        <br>
                        <div class="alert alert-danger col-xs-12" id="descriptionValidation" style="display: none">
                        </div>
                    </div>
                </div>

                <div class = "form-group col-md-12">
                    <div class="colums">
                        {!! Form::label('language', 'Idioma * :') !!}
                        {!! Form::select('language', Config::get('enums.languages'), ['required'=> '', 'data-parsley-mincheck'=> 1]) !!}
                        <div class="alert alert-danger col-xs-12" id="languageValidation" style="display: none">
                        </div>
                    </div>
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
                    <div class="alert alert-danger col-xs-12" id="imageValidation" style="display: none"></div>
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
                    <div class="alert alert-danger col-xs-12" id="videoValidation" style="display: none"></div>
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
                <div class="alert alert-danger col-xs-12" id="trailerValidation" style="display: none"></div>
            </div>

            <div class = "form-group col-md-12">
                {!! Form::label('trailer_subtitle', 'Subtitulos de Trailer:') !!}
                {!! Form::file('trailer_subtitle') !!}
            </div>

            <div class = "form-group col-md-12">
                {!! Form::label('asignatura_id', 'Asignatura * :') !!}
                {!! Form::select('asignatura_id', $subject) !!}
            </div>

            <div class = "form-group col-md-12">
                <div class="colums">
                    {!! Form::label('category', 'Categoria * :') !!}

                    <p>
                        Largometraje <input name="category" id="largometraje" value="largometraje" required="" type="radio">
                    </p>
                    <p>
                        Mediometraje <input name="category" id="mediometraje" value="mediometraje" type="radio">
                    </p>
                    <p>
                        Cortometraje <input name="category" id="cortometraje" value="cortometraje" type="radio">
                    </p>
                    <div class="alert alert-danger col-xs-12" id="categoryValidation" style="display: none">
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

                    <div class="alert alert-danger col-xs-12" id="genreValidation" style="display: none">
                    </div>
                </div>
            </div>

            <div class = "form-group col-md-12">
                {!! Form::label('shooting_format', 'Formato de Rodaje * :') !!}
                {!!Form::select('shooting_format', Config::get('enums.shooting_format_types'))!!}
                <div class="alert alert-danger col-xs-12" id="genreValidation" style="display: none"></div>
            </div>

            <div class = "form-group col-md-12">
                <div class="colums">
                    {!! Form::label('creation_date', 'Fecha Creación * :') !!}
                    <input type="text" id="creation_date" name="creation_date" class="form-control">

                    <div class="alert alert-danger col-xs-12" id="dateValidation" style="display: none">
                    </div>
                </div>
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
                    {!! Form::text('direction', null, ['class'=> 'form-control']) !!}
                    <br>
                    <div class="alert alert-danger col-xs-12" id="directionValidation" style="display: none">
                    </div>
                </div>
            </div>
            <br>
            <div class = "form-group col-md-12">
                <div class="colums">
                    {!! Form::label('direction_assistant', 'Asistente de Dirección:') !!}
                    {!! Form::text('direction_assistant', null, ['class'=> 'form-control']) !!}
                    <div class="alert alert-danger col-xs-12" id="directionAssistantValidation" style="display: none">
                    </div>
                </div>
            </div>

            <div class = "form-group col-md-12">
                <div class="colums">
                    {!! Form::label('casting', 'Casting:') !!}
                    {!! Form::text('casting', null, ['class'=> 'form-control']) !!}
                    <div class="alert alert-danger col-xs-12" id="castingValidation" style="display: none">
                    </div>
                </div>
            </div>

            <div class = "form-group col-md-12">
                <div class="colums">
                    {!! Form::label('continuista', 'Continuista:') !!}
                    {!! Form::text('continuista', null, ['class'=> 'form-control']) !!}
                    <div class="alert alert-danger col-xs-12" id="continusValidation" style="display: none">
                    </div>
                </div>
            </div>

            <div class = "form-group col-md-12">
                <div class="colums">
                    {!! Form::label('script', 'Guión * :') !!}
                    {!! Form::text('script', null, ['class'=> 'form-control', 'required'=> '']) !!}
                    <br>
                    <div class="alert alert-danger col-xs-12" id="scriptValidation" style="display: none">
                    </div>
                </div>
            </div>

            <div class = "form-group col-md-12">
                <div class="colums">
                    {!! Form::label('production', 'Producción * :') !!}
                    {!! Form::text('production', null, ['class'=> 'form-control', 'required'=> '']) !!}
                    <br>
                    <div class="alert alert-danger col-xs-12" id="productionValidation" style="display: none">
                    </div>
                </div>
            </div>

            <div class = "form-group col-md-12">
                <div class="colums">
                    {!! Form::label('production_assistant', 'Asistente de Producción * :') !!}
                    {!! Form::text('production_assistant', null, ['class'=> 'form-control', 'required'=> '']) !!}
                    <br>
                    <div class="alert alert-danger col-xs-12" id="AsisProductionValidation" style="display: none">
                    </div>
                </div>
            </div>
            <br>
            <div class = "form-group col-md-12">
                <div class="colums">
                    {!! Form::label('photografic_direction', 'Dirección de Fotografia:') !!}
                    {!! Form::text('photografic_direction', null, ['class'=> 'form-control']) !!}
                    <br>
                    <div class="alert alert-danger col-xs-12" id="photoValidation" style="display: none">
                    </div>
                </div>
            </div>

            <div class = "form-group col-md-12">
                <div class="colums">
                    {!! Form::label('camara', 'Camara * :') !!}
                    {!! Form::text('camara', null, ['class'=> 'form-control', 'required'=> '']) !!}
                    <br>
                    <div class="alert alert-danger col-xs-12" id="camaraValidation" style="display: none">
                    </div>
                </div>
            </div>
            <br>
            <div class = "form-group col-md-12">
                <div class="colums">
                    {!! Form::label('camara_assistant', 'Asistente de Camara:') !!}
                    {!! Form::text('camara_assistant', null, ['class'=> 'form-control']) !!}
                    <br>
                    <div class="alert alert-danger col-xs-12" id="camaraAsistValidation" style="display: none">
                    </div>
                </div>
            </div>

            <div class = "form-group col-md-12">
                <div class="colums">
                    {!! Form::label('art_direction', 'Dirección de Arte:') !!}
                    {!! Form::text('art_direction', null, ['class'=> 'form-control']) !!}
                    <br>
                    <div class="alert alert-danger col-xs-12" id="artValidation" style="display: none">
                    </div>
                </div>
            </div>

            <div class = "form-group col-md-12">
                <div class="colums">
                    {!! Form::label('sonorous_register', 'Registro Sonoro * :') !!}
                    {!! Form::text('sonorous_register', null, ['class'=> 'form-control', 'required'=> '']) !!}
                    <br>
                    <div class="alert alert-danger col-xs-12" id="sonorousValidation" style="display: none">
                    </div>
                </div>
            </div>

            <div class = "form-group col-md-12">
                <div class="colums">
                    {!! Form::label('mounting', 'Montaje * :') !!}
                    {!! Form::text('mounting', null, ['class'=> 'form-control', 'required'=> '']) !!}
                    <br>
                    <div class="alert alert-danger col-xs-12" id="mountingValidation" style="display: none">
                    </div>
                </div>
            </div>

            <div class = "form-group col-md-12">
                <div class="colums">
                    {!! Form::label('image_postproduction', 'Post-produccion de Imagen * :') !!}
                    {!! Form::text('image_postproduction', null, ['class'=> 'form-control', 'required'=> '']) !!}
                    <br>
                    <div class="alert alert-danger col-xs-12" id="imgValidation" style="display: none">
                    </div>
                </div>
            </div>

            <div class = "form-group col-md-12">
                <div class="colums">
                    {!! Form::label('sound_postproduction', 'Post-produccion de Sonido * :') !!}
                    {!! Form::text('sound_postproduction', null, ['class'=> 'form-control', 'required'=> '']) !!}
                    <br>
                    <div class="alert alert-danger col-xs-12" id="soundValidation" style="display: none">
                    </div>
                </div>
            </div>
            <br>
            <div class = "form-group col-md-12">
                <div class="colums">
                    {!! Form::label('catering', 'Catering:') !!}
                    {!! Form::text('catering', null, ['class'=> 'form-control']) !!}
                    <br>
                    <div class="alert alert-danger col-xs-12" id="cateringValidation" style="display: none">
                    </div>
                </div>
            </div>

            <div class = "form-group col-md-12">
                <div class="colums">
                    {!! Form::label('music', 'Música:') !!}
                    {!! Form::text('music', null, ['class'=> 'form-control']) !!}
                    <br>
                    <div class="alert alert-danger col-xs-12" id="musicValidation" style="display: none">
                    </div>
                </div>
            </div>

            <div class = "form-group col-md-12">
                <div class="colums">
                    {!! Form::label('actors', 'Actores * :') !!}
                    {!! Form::text('actors', null, ['class'=> 'form-control', 'required'=> '']) !!}
                    <br>
                    <div class="alert alert-danger col-xs-12" id="actorsValidation" style="display: none">
                    </div>
                </div>
            </div>
            <div class="colums">
                {!! Form::submit('Registrar',['class' =>'btn btn-primary disabled sendButton orangeButton', 'value' =>'validate']) !!}
                {!! Form::close() !!}
                <br>
                <p class="text-danger" id="sendValidation"> Se deben completar todos los campos marcados como obligatorios para enviar el formulario. </p>
            </div>
        </div>
        </div>


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

@stop

@section('page-style-files')
    <link rel="stylesheet" href="http://code.jquery.com/ui/1.10.1/themes/base/jquery-ui.css" />
@stop

@section('page-js-files')
    <script src="http://code.jquery.com/ui/1.10.1/jquery-ui.js"></script>
    <script type="text/javascript" src="js/plupload.full.min.js"></script>
    <script src="assets/vendor/parsleyjs/dist/parsley.min.js"></script>
    <script type="text/javascript" src="assets/vendor/parsleyjs/dist/i18n/es.js"></script>
    <script type="text/javascript" src="/js/i18n/es.js"></script>
@stop

@section('page-js-script')
    <script>
        var j = jQuery.noConflict();
        j( function() {
            j( "#cant_sub" ).on( "change", function() {
                if(j("#cant_sub").val() > 5){
                    alert("Máximo de 5 subtitulos")
                    j("#cant_sub").val(5);
                }else if(j("#cant_sub").val() < 0){
                    j("#cant_sub").val(0);
                }else if ((j("#cant_sub").val() <= 5) && (j("#cant_sub").val() > 0)){
                    var subs = j("#cant_sub").val();
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

    <script>
        /**
            Script para calendario js
        **/
        var j = jQuery.noConflict();
        j.datepicker.regional['es'] = {
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
        j.datepicker.setDefaults(j.datepicker.regional['es']);
        j(function () {
            j("#creation_date").datepicker();
        });

    </script>

    <script type="text/javascript">
        /**
        Script para validacion de campos en formulario
        **/
        var j = jQuery.noConflict();

        var validName = 0;
        var validDescription = 0;
        var validCreationDate = 0;
        var validDirection = 0;
        var validDirectionAsist = 0;
        var validCasting = 0;
        var validContinuista = 0;
        var validScript = 0;
        var validProduction = 0;
        var validProductionAssistant = 0;
        var validPhotograficDirection = 0;
        var validCamara = 0;
        var validCamaraAsist = 0;
        var validArt = 0;
        var validSonorousRegister = 0;
        var validMounting = 0;
        var validImagePostproduction = 0;
        var validSoundPostproduction = 0;
        var validCatering = 0;
        var validMusic = 0;
        var validActors = 0;
            
        j('#name').on('input',function(e){
            checkName();
        });
        j('#description').on('input',function(e){
            checkDescription();
        });
        j('#creation_date').on('input',function(e){
            checkCreationDate();
        });
        j('#direction').on('input',function(e){
            checkDirection();
        });
        j('#direction_assistant').on('input',function(e){
            checkDirectionAsist();
        });
        j('#casting').on('input',function(e){
            checkCasting();
        });
        j('#continuista').on('input',function(e){
            checkContinuista();
        });
        j('#script').on('input',function(e){
            checkScript();
        });
        j('#production').on('input',function(e){
            checkProduction();
        });
        j('#production_assistant').on('input',function(e){
            checkProductionAssistant();
        });
        j('#photografic_direction').on('input',function(e){
            checkPhoto();
        });
        j('#camara').on('input',function(e){
            checkCamara();
        });
        j('#camara_assistant').on('input',function(e){
            checkCamaraAsist();
        });
        j('#art_direction').on('input',function(e){
            checkArtDirection();
        });
        j('#sonorous_register').on('input',function(e){
            checkSonorousRegister();
        });
        j('#mounting').on('input',function(e){
            checkMounting();
        });
        j('#image_postproduction').on('input',function(e){
            checkImagePostproduction();
        });
        j('#sound_postproduction').on('input',function(e){
            checkSoundPostproduction();
        });
        j('#catering').on('input',function(e){
            checkCatering();
        });
        j('#music').on('input',function(e){
            checkMusic();
        });
        j('#actors').on('input',function(e){
            checkActors();
        });

        function checkName(){
            var name = j('#name').val();
            var BLIDRegExpression = /^[a-zA-Z0-9\ \Ñ\ñ\,\.\:\;\u00C0-\u017F\-\_\?\¿\!\(\)\[\]]+$/;
            if(name.length == 0){
                document.getElementById("nameValidation").style.display = "inline";
                document.getElementById("nameValidation").innerHTML = 'Campo Obligatorio';
                validName = 0;
            }else if (!BLIDRegExpression.test(name)) {
                document.getElementById("nameValidation").style.display = "inline";
                document.getElementById("nameValidation").innerHTML = 'El Campo Contiene Caracteres Invalidos';
                validName = 0;
            }else{
                document.getElementById("nameValidation").style.display = "none";
                validName = 1;
            }
        }

        function checkDescription(){
            var description = j('#description').val();
            var BLIDRegExpression = /^[a-zA-Z0-9\ \Ñ\ñ\u00C0-\u017F\-\_\,\.\:\;\¿\?\!\(\)\[\]]+$/;
            if(description.length == 0){
                document.getElementById("descriptionValidation").style.display = "inline";
                document.getElementById("descriptionValidation").innerHTML = 'Campo Obligatorio';
               validDescription = 0;
            }else if (!BLIDRegExpression.test(description)) {
                document.getElementById("descriptionValidation").style.display = "inline";
                document.getElementById("descriptionValidation").innerHTML = 'El Campo Contiene Caracteres Invalidos';
                validDescription = 0;
            }else{
                document.getElementById("descriptionValidation").style.display = "none";
                validDescription = 1;
            }
        }
        function checkCreationDate(){
            var creation_date = j('#creation_date').val();
            var BLIDRegExpression = /^[0-9\ \/\-\_]+$/;
            if(creation_date.length == 0){
                document.getElementById("dateValidation").style.display = "inline";
                document.getElementById("dateValidation").innerHTML = 'Campo Obligatorio';
                validCreationDate = 0;
            }else{
                document.getElementById("dateValidation").style.display = "none";
                validCreationDate = 1;
            }
        }
        function checkDirection(){
            var direction = j('#direction').val();
            var BLIDRegExpression = /^[a-zA-Z0-9\ \:\;\¿\?\!\,\.\Ñ\ñ\u00C0-\u017F]+$/;
            if(direction.length == 0){
                document.getElementById("directionValidation").style.display = "inline";
                document.getElementById("directionValidation").innerHTML = 'Campo Obligatorio';
                validDirection = 0;
            }else if (!BLIDRegExpression.test(direction)) {
                document.getElementById("directionValidation").style.display = "inline";
                document.getElementById("directionValidation").innerHTML = 'El Campo Contiene Caracteres Invalidos';
                validDirection = 0;
            }else{
                document.getElementById("directionValidation").style.display = "none";
                validDirection = 1;
            }
        }
        function checkDirectionAsist(){
            var direction_assistant = j('#direction_assistant').val();
            var BLIDRegExpression = /^[a-zA-Z0-9\ \:\;\¿\?\!\,\.\Ñ\ñ\u00C0-\u017F]+$/;
            if (direction_assistant.length == 0){
                document.getElementById("directionAssistantValidation").style.display = "none";
                validDirectionAsist = 1;
            }else if (!BLIDRegExpression.test(direction_assistant)) {
                document.getElementById("directionAssistantValidation").style.display = "inline";
                document.getElementById("directionAssistantValidation").innerHTML = 'El Campo Contiene Caracteres Invalidos';
                validDirectionAsist = 0;
            }else{
                document.getElementById("directionAssistantValidation").style.display = "none";
                validDirectionAsist = 1;
            }
        }
        function checkCasting(){
            var casting = j('#casting').val();
            var BLIDRegExpression = /^[a-zA-Z0-9\ \:\;\¿\?\!\,\.\Ñ\ñ\u00C0-\u017F]+$/;
             if (casting.length == 0){
                document.getElementById("castingValidation").style.display = "none";
                validCasting = 1;
            }else if (!BLIDRegExpression.test(casting)) {
                document.getElementById("castingValidation").style.display = "inline";
                document.getElementById("castingValidation").innerHTML = 'El Campo Contiene Caracteres Invalidos';
                validCasting = 0;
            }else{
                document.getElementById("castingValidation").style.display = "none";
                validCasting = 1;
            }
        }
        function checkContinuista(){
            var continuista = j('#continuista').val();
            var BLIDRegExpression = /^[a-zA-Z0-9\ \:\;\¿\?\!\,\.\Ñ\ñ\u00C0-\u017F]+$/;
             if (continuista.length == 0){
                document.getElementById("continusValidation").style.display = "none";
                validContinuista = 1;
            }else if (!BLIDRegExpression.test(continuista)) {
                document.getElementById("continusValidation").style.display = "inline";
                document.getElementById("continusValidation").innerHTML = 'El Campo Contiene Caracteres Invalidos';
                validContinuista = 0;
            }else{
                document.getElementById("continusValidation").style.display = "none";
                validContinuista = 1;
            }
        }
        function checkScript(){
            var script = j('#script').val();
            var BLIDRegExpression = /^[a-zA-Z0-9\ \:\;\¿\?\!\,\.\Ñ\ñ\u00C0-\u017F]+$/;
            if(script.length == 0){
                document.getElementById("scriptValidation").style.display = "inline";
                document.getElementById("scriptValidation").innerHTML = 'Campo Obligatorio';
                validScript = 0;
            }else if (!BLIDRegExpression.test(script)) {
                document.getElementById("scriptValidation").style.display = "inline";
                document.getElementById("scriptValidation").innerHTML = 'El Campo Contiene Caracteres Invalidos';
                validScript = 0;
            }else{
                document.getElementById("scriptValidation").style.display = "none";
                validScript = 1;
            }
        }
        function checkProduction(){
            var production = j('#production').val();
            var BLIDRegExpression = /^[a-zA-Z0-9\ \:\;\¿\?\!\,\.\Ñ\ñ\u00C0-\u017F]+$/;
            if(production.length == 0){
                document.getElementById("productionValidation").style.display = "inline";
                document.getElementById("productionValidation").innerHTML = 'Campo Obligatorio';
                validProduction = 0;
            }else if (!BLIDRegExpression.test(production)) {
                document.getElementById("productionValidation").style.display = "inline";
                document.getElementById("productionValidation").innerHTML = 'El Campo Contiene Caracteres Invalidos';
                validProduction = 0;
            }else{
                document.getElementById("productionValidation").style.display = "none";
                validProduction = 1;
            }
        }
        function checkProductionAssistant(){
            var production_assistant = j('#production_assistant').val();
            var BLIDRegExpression = /^[a-zA-Z0-9\ \:\;\¿\?\!\,\.\Ñ\ñ\u00C0-\u017F]+$/;
            if(production_assistant.length == 0){
                document.getElementById("AsisProductionValidation").style.display = "inline";
                document.getElementById("AsisProductionValidation").innerHTML = 'Campo Obligatorio';
                validProductionAssistant = 0;
            }else if (!BLIDRegExpression.test(production_assistant)) {
                document.getElementById("AsisProductionValidation").style.display = "inline";
                document.getElementById("AsisProductionValidation").innerHTML = 'El Campo Contiene Caracteres Invalidos';
                validProductionAssistant = 0;
            }else{
                document.getElementById("AsisProductionValidation").style.display = "none";
                validProductionAssistant = 1;
            }
        }
        function checkPhoto(){
            var photografic_direction = j('#photografic_direction').val();
            var BLIDRegExpression = /^[a-zA-Z0-9\ \:\;\¿\?\!\,\.\Ñ\ñ\u00C0-\u017F]+$/;
            if (photografic_direction.length == 0){
                document.getElementById("photoValidation").style.display = "none";
                validPhotograficDirection = 1;
            }else if (!BLIDRegExpression.test(photografic_direction)) {
                document.getElementById("photoValidation").style.display = "inline";
                document.getElementById("photoValidation").innerHTML = 'El Campo Contiene Caracteres Invalidos';
                validPhotograficDirection = 0;
            }else{
                document.getElementById("photoValidation").style.display = "none";
                validPhotograficDirection = 1;
            }
        }
        function checkCamara(){
            var camara = j('#camara').val();
            var BLIDRegExpression = /^[a-zA-Z0-9\ \:\;\¿\?\!\,\.\Ñ\ñ\u00C0-\u017F]+$/;
            if(camara.length == 0){
                document.getElementById("camaraValidation").style.display = "inline";
                document.getElementById("camaraValidation").innerHTML = 'Campo Obligatorio';
                validCamara = 0;
            }else if (!BLIDRegExpression.test(camara)) {
                document.getElementById("camaraValidation").style.display = "inline";
                document.getElementById("camaraValidation").innerHTML = 'El Campo Contiene Caracteres Invalidos';
                validCamara = 0;
            }else{
                document.getElementById("camaraValidation").style.display = "none";
                validCamara = 1;
            }
        }
        function checkCamaraAsist(){
            var camara_assistant = j('#camara_assistant').val();
            var BLIDRegExpression = /^[a-zA-Z0-9\ \:\;\¿\?\!\,\.\Ñ\ñ\u00C0-\u017F]+$/;
            if (camara_assistant.length == 0){
                document.getElementById("camaraAsistValidation").style.display = "none";
                validCamaraAsist = 1;
            }else if (!BLIDRegExpression.test(camara_assistant)) {
                document.getElementById("camaraAsistValidation").style.display = "inline";
                document.getElementById("camaraAsistValidation").innerHTML = 'El Campo Contiene Caracteres Invalidos';
                validCamaraAsist = 0;
            }else {
                document.getElementById("camaraAsistValidation").style.display = "none";
                validCamaraAsist = 1;
            }
        }
        function checkArtDirection(){
            var art_direction = j('#art_direction').val();
            var BLIDRegExpression = /^[a-zA-Z0-9\ \:\;\¿\?\!\,\.\Ñ\ñ\u00C0-\u017F]+$/;
            if (art_direction.length == 0){
                document.getElementById("artValidation").style.display = "none";
                validArt = 1;
            }else if (!BLIDRegExpression.test(art_direction)) {
                document.getElementById("artValidation").style.display = "inline";
                document.getElementById("artValidation").innerHTML = 'El Campo Contiene Caracteres Invalidos';
                validArt = 0;
            }else{
                document.getElementById("artValidation").style.display = "none";
                validArt = 1;
            }
        }
        function checkSonorousRegister(){
            var sonorous_register = j('#sonorous_register').val();
            var BLIDRegExpression = /^[a-zA-Z0-9\ \:\;\¿\?\!\,\.\Ñ\ñ\u00C0-\u017F]+$/;
            if(sonorous_register.length == 0){
                document.getElementById("sonorousValidation").style.display = "inline";
                document.getElementById("sonorousValidation").innerHTML = 'Campo Obligatorio';
                validSonorousRegister = 0;
            }else if (!BLIDRegExpression.test(sonorous_register)) {
                document.getElementById("sonorousValidation").style.display = "inline";
                document.getElementById("sonorousValidation").innerHTML = 'El Campo Contiene Caracteres Invalidos';
                validSonorousRegister = 0;
            }else{
                document.getElementById("sonorousValidation").style.display = "none";
                validSonorousRegister = 1;
            }
        }
        function checkMounting(){
            var mounting = j('#mounting').val();
            var BLIDRegExpression = /^[a-zA-Z0-9\ \:\;\¿\?\!\,\.\Ñ\ñ\u00C0-\u017F]+$/;
            if(mounting.length == 0){
                document.getElementById("mountingValidation").style.display = "inline";
                document.getElementById("mountingValidation").innerHTML = 'Campo Obligatorio';
                validMounting = 0;
            }else if (!BLIDRegExpression.test(mounting)) {
                document.getElementById("mountingValidation").style.display = "inline";
                document.getElementById("mountingValidation").innerHTML = 'El Campo Contiene Caracteres Invalidos';
                validMounting = 0;
            }else{
                document.getElementById("mountingValidation").style.display = "none";
                validMounting = 1;
            }
        }
        function checkImagePostproduction(){
            var image_postproduction = j('#image_postproduction').val();
            var BLIDRegExpression = /^[a-zA-Z0-9\ \:\;\¿\?\!\,\.\Ñ\ñ\u00C0-\u017F]+$/;
            if(image_postproduction.length == 0){
                document.getElementById("imgValidation").style.display = "inline";
                document.getElementById("imgValidation").innerHTML = 'Campo Obligatorio';
                validImagePostproduction = 0;
            }else if (!BLIDRegExpression.test(image_postproduction)) {
                document.getElementById("imgValidation").style.display = "inline";
                document.getElementById("imgValidation").innerHTML = 'El Campo Contiene Caracteres Invalidos';
                validImagePostproduction = 0;
            }else{
                document.getElementById("imgValidation").style.display = "none";
                validImagePostproduction = 1;
            }
        }
        function checkSoundPostproduction(){
            var sound_postproduction = j('#sound_postproduction').val();
            var BLIDRegExpression = /^[a-zA-Z0-9\ \:\;\¿\?\!\,\.\Ñ\ñ\u00C0-\u017F]+$/;
            if(sound_postproduction.length == 0){
                document.getElementById("soundValidation").style.display = "inline";
                document.getElementById("soundValidation").innerHTML = 'Campo Obligatorio';
                validSoundPostproduction = 0;
            }else if (!BLIDRegExpression.test(sound_postproduction)) {
                document.getElementById("soundValidation").style.display = "inline";
                document.getElementById("soundValidation").innerHTML = 'El Campo Contiene Caracteres Invalidos';
                validSoundPostproduction = 0;
            }else{
                document.getElementById("soundValidation").style.display = "none";
                validSoundPostproduction = 1;
            }
        }
        function checkCatering(){
            var catering = j('#catering').val();
            var BLIDRegExpression = /^[a-zA-Z0-9\ \:\;\¿\?\!\,\.\Ñ\ñ\u00C0-\u017F]+$/;
            if (catering.length == 0){
                document.getElementById("cateringValidation").style.display = "none";
                validCatering = 1;
            }else if (!BLIDRegExpression.test(catering)) {
                document.getElementById("cateringValidation").style.display = "inline";
                document.getElementById("cateringValidation").innerHTML = 'El Campo Contiene Caracteres Invalidos';
                validCatering = 0;
            }else{
                document.getElementById("cateringValidation").style.display = "none";
                validCatering = 1;
            }
        }
        function checkMusic(){
            var music = j('#music').val();
            var BLIDRegExpression = /^[a-zA-Z0-9\ \:\;\¿\?\!\,\.\Ñ\ñ\u00C0-\u017F]+$/;
            if (music.length == 0){
                document.getElementById("musicValidation").style.display = "none";
                validMusic = 1;
            }else 
            if (!BLIDRegExpression.test(music)) {
                document.getElementById("musicValidation").style.display = "inline";
                document.getElementById("musicValidation").innerHTML = 'El Campo Contiene Caracteres Invalidos';
                validMusic = 0;
            }else{
                document.getElementById("musicValidation").style.display = "none";
                validMusic = 1;
            }
        }
        function checkActors(){
            var actors = j('#actors').val();
            var BLIDRegExpression = /^[a-zA-Z0-9\ \:\;\¿\?\!\,\.\Ñ\ñ\u00C0-\u017F]+$/;
            if(actors.length == 0){
                document.getElementById("actorsValidation").style.display = "inline";
                document.getElementById("actorsValidation").innerHTML = 'Campo Obligatorio';
                validActors = 0;
            }else if (!BLIDRegExpression.test(actors)) {
                document.getElementById("actorsValidation").style.display = "inline";
                document.getElementById("actorsValidation").innerHTML = 'El Campo Contiene Caracteres Invalidos';
                validActors = 0;
            }else{
                document.getElementById("actorsValidation").style.display = "none";
                validActors = 1;
            }
        }
        function checkForm() {
            if(
                validName == 0 || 
                validDescription == 0 || 
                validCreationDate == 0 || 
                validDirection == 0 || 
                validDirectionAsist == 0 || 
                validCasting == 0 || 
                validContinuista == 0 || 
                validScript == 0 || 
                validProduction == 0 || 
                validProductionAssistant == 0 || 
                validPhotograficDirection == 0 || 
                validCamara == 0 || 
                validCamaraAsist == 0 || 
                validArt == 0 || 
                validSonorousRegister == 0 || 
                validMounting == 0 || 
                validImagePostproduction == 0 || 
                validSoundPostproduction == 0 ||
                validCatering == 0 ||
                validMusic == 0 || 
                validActors == 0){
                j(".sendButton").attr('class', 'btn btn-primary disabled sendButton');
                document.getElementById("sendValidation").style.display = "inline";
                document.getElementById("sendValidation").innerHTML = 'Se deben completar todos los campos marcados como obligatorios para enviar el formulario'; 
            }
            if(
                validName == 1 && 
                validDescription == 1 && 
                validCreationDate == 1 && 
                validDirection == 1 && 
                validDirectionAsist == 1 && 
                validCasting == 1 && 
                validContinuista == 1 && 
                validScript == 1 && 
                validProduction == 1 && 
                validProductionAssistant == 1 && 
                validPhotograficDirection == 1 && 
                validCamara == 1 && 
                validCamaraAsist == 1 && 
                validArt == 1 && 
                validSonorousRegister == 1 && 
                validMounting == 1 && 
                validImagePostproduction == 1 && 
                validSoundPostproduction == 1 &&
                validCatering == 1 &&
                validMusic == 1 && 
                validActors == 1){
                j(".sendButton").attr('class', 'btn btn-primary active sendButton');
                document.getElementById("sendValidation").style.display = "none";
            }            
        }
    </script>

    <script type="text/javascript">
        // Subir Videos
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
        // Subir Imagen
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
        // Subir Trailer
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
                    document.getElementById('trailer').value = file.name;
                    alert("valor: " + document.getElementById('trailer').value);
                });
               }else{
                alert("No se puede agregar mas trailers");
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

@stop