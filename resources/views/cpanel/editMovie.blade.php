@extends('layouts.controlPanel')

@section('content')

<script type="text/javascript" src="/js/editMovie.js"></script>

@if (!Auth::guest())
	@if ((Auth::user()->tipo == "profesor") || (Auth::user()->tipo == "administrador"))
    <div class="col-sm-10 col-sm-offset-1" style="overflow: hidden; 
    background-color: #f8f8f8;
    border-color: #e7e7e7;">
    <h3 class="orangeAndBoldText" style="margin-bottom: 30px; padding-left: 20px;">Modificar Video</h3>
    <div style="padding-left: 20px; padding-right: 20px;">
		{!!Form::model($movie, array('id'=>"editMovieForm"), ['route'=>[ 'upload.update',$movie->id],'method'=>'PUT'])!!}
            <div class="col-xs-12">
                <h4 class="blackAndBoldText">Información Importante</h4>
                <div class="col-xs-12">
                    <div class = "form-group col-sm-12 col-md-6">
                        {!! Form::label('name', 'Nombre *:') !!}
                        {!! Form::text('name', null, ['class'=> 'form-control', 'required'=> '']) !!}
                        <div class="alert alert-danger col-xs-12" id="nameValidation" style="display: none">
                        </div>
                    </div>
                    <div class = "form-group col-sm-12 col-md-6">
                        {!! Form::label('creation_date', 'Fecha Creación *:') !!}
                        {!! Form::text('creation_date', null, ['class'=> 'form-control', 'required'=> '']) !!}
                        <div class="alert alert-danger col-xs-12" id="dateValidation" style="display: none">
                        </div>
                    </div>
                </div>
                <div class="col-xs-12">
                    <div class = "form-group col-sm-12 col-md-6">
                        <label for="language" class="col-md-12 control-label">Idioma *: </label>
                            <select class="form-control" name="language" id="language">
                                <option value="">SELECCIONE IDIOMA</option>
                                <script>
                                    var languageEdit = '{!!$movie->language!!}';
                                    setLanguages(languageEdit);
                                </script>
                            </select>
                        
                        <div class="alert alert-danger col-xs-12" id="languageValidation" style="display: none">
                        </div>
                    </div>

                    <div class = "form-group col-sm-12 col-md-6">
                        <label for="asignatura_id" class="col-md-12 control-label">Asignatura *: </label>
                        <select class="form-control" name="asignatura_id" id="asignatura_id">
                            <option value="">SELECCIONE ASIGNATURA</option>
                            <script>
                                var submitEdit = '{!!$movie->asignatura_id!!}';
                                setSubmits(submitEdit);
                            </script>
                        </select>
                        <div class="alert alert-danger col-xs-12" id="subjectValidation" style="display: none">
                        </div>
                    </div>
                </div>
            </div> 
            <div class="col-xs-12">
                <hr>
                <h4 class="blackAndBoldText">Categorías de Video:</h4>
                <div class="col-xs-12">
                    <div class = "form-group col-sm-12 col-md-6">
                        <label for="category" class="col-md-12 control-label">Categoría *: </label>
                        <select class="form-control" name="category" id="category">
                            <option value="">SELECCIONE CATEGORIA</option>
                            <script>
                                var categoryEdit = '{!!$movie->category!!}';
                                setCategories(categoryEdit);
                            </script>
                        </select>
                        <div class="alert alert-danger col-xs-12" id="categoryValidation" style="display: none">
                        </div>
                    </div>
                    <div class = "form-group col-sm-12 col-md-6">
                        <label for="category2" class="col-md-12 control-label">Genero *: </label>
                        <select class="form-control" name="category2" id="category2">
                            <option value="">SELECCIONE GENERO</option>
                            <script>
                                var genreEdit = '{!!$movie->category2!!}';
                                setGenres(genreEdit);
                            </script>
                        </select>
                        <div class="alert alert-danger col-xs-12" id="genreValidation" style="display: none">
                        </div>

                    </div>
                </div>

                <div class="col-xs-12">
                    <div class = "form-group col-sm-12 col-md-6">
                        <label for="shooting_format" class="col-md-12 control-label">Formato de Rodaje *: </label>
                        <select class="form-control" name="shooting_format" id="shooting_format">
                            <option value="">SELECCIONE FORMATO DE RODAJE</option>
                            <script>
                                var shotingEdit = '{!!$movie->shooting_format!!}';
                                setShoting(shotingEdit);
                            </script>
                        </select>
                        <div class="alert alert-danger col-xs-12" id="shootingValidation" style="display: none">
                        </div>
                    </div>

                    

                    <div class = "form-group col-sm-12 col-md-6">
                        <label for="production_year" class="col-md-12 control-label">Año de Producción *: </label>
                        <select class="form-control" name="production_year" id="production_year">
                            <option value="">SELECCIONE AÑO</option>
                                <?php
                                    $years = range(date("Y"), date("Y", strtotime("now - 100 years")));
                                    foreach($years as $year){
                                        $thisyear = $movie->production_year;
                                        if ($thisyear ==  $year){
                                        echo '<option value="'.$year.'" selected="selected">'.$year.'</option>';
                                        }else{
                                            echo'<option value="'.$year.'">'.$year.'</option>';
                                        }
                                    }
                                    ?>
                        </select>
                        <div class="alert alert-danger col-xs-12" id="yearValidation" style="display: none">
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xs-12">
                <hr>
                <h4 class="blackAndBoldText">Información Complementaria</h4>
                <div class="col-xs-12">
                    <div class = "form-group col-sm-12 col-md-6">
                        {!! Form::label('direction', 'Dirección *:') !!}
                        {!! Form::text('direction', null, ['class'=> 'form-control']) !!}
                        <div class="alert alert-danger col-xs-12" id="directionValidation" style="display: none">
                        </div>
                    </div>

                    <div class = "form-group col-sm-12 col-md-6">
                        {!! Form::label('direction_assistant', 'Asistente de Dirección:') !!}
                        {!! Form::text('direction_assistant', null, ['class'=> 'form-control']) !!}
                        <div class="alert alert-danger col-xs-12" id="directionAssistantValidation" style="display: none">
                        </div>
                    </div>
                </div>

                <div class="col-xs-12">
                    <div class = "form-group col-sm-12 col-md-6">
                        {!! Form::label('production', 'Produccion *:') !!}
                        {!! Form::text('production', null, ['class'=> 'form-control', 'required'=> '']) !!}
                        <div class="alert alert-danger col-xs-12" id="productionValidation" style="display: none">
                        </div>
                    </div>

                    <div class = "form-group col-sm-12 col-md-6">
                        {!! Form::label('production_assistant', 'Asistente de Produccion *:') !!}
                        {!! Form::text('production_assistant', null, ['class'=> 'form-control', 'required'=> '']) !!}
                        <div class="alert alert-danger col-xs-12" id="productionAssistantValidation" style="display: none">
                        </div>
                    </div>
                </div>
                <div class="col-xs-12">
                    <div class = "form-group col-sm-12 col-md-6">
                        {!! Form::label('camara', 'Camara *:') !!}
                        {!! Form::text('camara', null, ['class'=> 'form-control']) !!}
                        <div class="alert alert-danger col-xs-12" id="camaraValidation" style="display: none">
                        </div>
                    </div>

                    <div class = "form-group col-sm-12 col-md-6">
                        {!! Form::label('camara_assistant', 'Asistente de Camara:') !!}
                        {!! Form::text('camara_assistant', null, ['class'=> 'form-control']) !!}
                        <div class="alert alert-danger col-xs-12" id="camaraAssistantValidation" style="display: none">
                        </div>
                    </div>
                </div>
                <div class="col-xs-12">
                    <div class = "form-group col-sm-12 col-md-6">
                        {!! Form::label('continuista', 'Continuista:') !!}
                        {!! Form::text('continuista', null, ['class'=> 'form-control']) !!}
                        <div class="alert alert-danger col-xs-12" id="continuistaValidation" style="display: none">
                        </div>
                    </div>

                    <div class = "form-group col-sm-12 col-md-6">
                        {!! Form::label('script', 'Guion *:') !!}
                        {!! Form::text('script', null, ['class'=> 'form-control', 'required'=> '']) !!}
                        <div class="alert alert-danger col-xs-12" id="scriptValidation" style="display: none">
                        </div>
                    </div>
                </div>
                <div class="col-xs-12">
                    <div class = "form-group col-sm-12 col-md-6">
                        {!! Form::label('photografic_direction', 'Dirección de Fotografia:') !!}
                        {!! Form::text('photografic_direction', null, ['class'=> 'form-control']) !!}
                        <div class="alert alert-danger col-xs-12" id="photograficDirectionValidation" style="display: none">
                        </div>
                    </div>

                    <div class = "form-group col-sm-12 col-md-6">
                        {!! Form::label('art_direction', 'Direccion de Arte:') !!}
                        {!! Form::text('art_direction', null, ['class'=> 'form-control']) !!}
                        <div class="alert alert-danger col-xs-12" id="artValidation" style="display: none">
                        </div>
                    </div>
                </div>
                <div class="col-xs-12">
                    <div class = "form-group col-sm-12 col-md-6">
                        {!! Form::label('sonorous_register', 'Registro Sonoro *:') !!}
                        {!! Form::text('sonorous_register', null, ['class'=> 'form-control', 'required'=> '']) !!}
                        <div class="alert alert-danger col-xs-12" id="sonorousRegisterValidation" style="display: none">
                        </div>
                    </div>
                    <div class = "form-group col-sm-12 col-md-6">
                        {!! Form::label('music', 'Música:') !!}
                        {!! Form::text('music', null, ['class'=> 'form-control']) !!}
                        <div class="alert alert-danger col-xs-12" id="musicValidation" style="display: none">
                        </div>
                    </div>
                </div>
                <div class="col-xs-12">
                    <div class = "form-group col-sm-12 col-md-6">
                        {!! Form::label('image_postproduction', 'Post-produccion de Imagen *:') !!}
                        {!! Form::text('image_postproduction', null, ['class'=> 'form-control', 'required'=> '']) !!}
                        <div class="alert alert-danger col-xs-12" id="imagePostValidation" style="display: none">
                        </div>
                    </div>

                    <div class = "form-group col-sm-12 col-md-6">
                        {!! Form::label('sound_postproduction', 'Post-produccion de Sonido *:') !!}
                        {!! Form::text('sound_postproduction', null, ['class'=> 'form-control', 'required'=> '']) !!}
                        <div class="alert alert-danger col-xs-12" id="soundPostValidation" style="display: none">
                        </div>
                    </div>
                </div>
                <div class="col-xs-12">
                    <div class = "form-group col-sm-12 col-md-6">
                        {!! Form::label('casting', 'Casting:') !!}
                        {!! Form::text('casting', null, ['class'=> 'form-control']) !!}
                        <div class="alert alert-danger col-xs-12" id="castingValidation" style="display: none">
                        </div>
                    </div>
                    <div class = "form-group col-sm-12 col-md-6">
                        {!! Form::label('mounting', 'Montaje *:') !!}
                        {!! Form::text('mounting', null, ['class'=> 'form-control', 'required'=> '']) !!}
                        <div class="alert alert-danger col-xs-12" id="mountingValidation" style="display: none">
                        </div>
                    </div>
                </div>
                <div class="col-xs-12">
                    <div class = "form-group col-sm-12 col-md-6">
                        {!! Form::label('catering', 'Catering:') !!}
                        {!! Form::text('catering', null, ['class'=> 'form-control']) !!}
                        <div class="alert alert-danger col-xs-12" id="cateringValidation" style="display: none">
                        </div>
                    </div>
                    <div class = "form-group col-xs-12 col-md-6">
                        {!! Form::label('cant_other', 'Campos Agregados :') !!}
                        <input id="cant_other" value="{!!$movie->cant_other!!}" type="number" min="0" max="3" class="form-control">
                    </div>
                </div>


                <div id="other1" class="col-xs-12" style ="display: none;">
                    <div class = "form-group col-xs-12 col-md-6">
                        {!! Form::label('other1Name', 'Campo:') !!}
                        {!! Form::text('other1Name', null, ['class'=> 'form-control']) !!}
                    </div>
                    <div class = "form-group col-xs-12 col-md-6">
                        {!! Form::label('other1Content', 'Valor:') !!}
                        {!! Form::text('other1Content', null, ['class'=> 'form-control']) !!}
                    </div>
                </div>
                <div id="other2" class="col-xs-12" style ="display: none;">
                    <div class = "form-group col-xs-12 col-md-6">
                        {!! Form::label('other2Name', 'Campo:') !!}
                        {!! Form::text('other2Name', null, ['class'=> 'form-control']) !!}
                    </div>
                    <div class = "form-group col-xs-12 col-md-6">
                        {!! Form::label('other2Content', 'Valor:') !!}
                        {!! Form::text('other2Content', null, ['class'=> 'form-control']) !!}
                    </div>
                </div>
                <div id="other3" class="col-xs-12" style ="display: none;">
                    <div class = "form-group col-xs-12 col-md-6">
                        {!! Form::label('other3Name', 'Campo:') !!}
                        {!! Form::text('other3Name', null, ['class'=> 'form-control']) !!}
                    </div>
                    <div class = "form-group col-xs-12 col-md-6">
                        {!! Form::label('other3Content', 'Valor:') !!}
                        {!! Form::text('other3Content', null, ['class'=> 'form-control']) !!}
                    </div>
                </div>


                    <div class="col-xs-12">
                        <div class = "form-group">
                            {!! Form::label('description', 'Descripcion *:') !!}
                            {!! Form::textarea('description', null, ['class'=> 'form-control', 'required'=> '']) !!}
                            <div class="alert alert-danger col-xs-12" id="descriptionValidation" style="display: none">
                            </div>
                        </div>
                    </div>
                <div class="col-xs-12">
                    <div class = "form-group">
                        {!! Form::label('actors', 'Actores *:') !!}
                        {!! Form::textarea('actors', null, ['class'=> 'form-control', 'required'=> '']) !!}
                        <div class="alert alert-danger col-xs-12" id="actorsValidation" style="display: none">
                        </div>
                    </div>
                </div>

                <div class="col-xs-12">
                    {!!Form::submit('Actualizar',['class'=>'btn btn-primary active sendButton orangeButton', 'value' =>'validate'])!!}
                    <br>
                    <p class="text-danger" id="sendValidation" style="display: none"> Se deben completar todos los campos marcados como obligatorios para enviar el formulario. </p>
                </div>
            </div>
		{!!Form::close()!!}
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
        <link href='/assets/vendor/parsleyjs/src/parsley.css' rel='stylesheet' />
        <link rel="stylesheet" href="http://code.jquery.com/ui/1.10.1/themes/base/jquery-ui.css" />
        @stop

        @section('page-js-files')
        <script src="http://code.jquery.com/ui/1.10.1/jquery-ui.js"></script>
        <script src="/assets/vendor/parsleyjs/dist/parsley.min.js"></script>
		<script type="text/javascript" src="/assets/vendor/parsleyjs/dist/i18n/es.js"></script>
        @stop

        @section('page-js-script')

        <script>
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
                j('#creation_date').datepicker()
                    .on("input change", function (e) {
                    checkCreationDate();
                });
            });
           
        </script>
        <script>
            
            var j = jQuery.noConflict();

            var validName = 1;
            var validCreationDate = 1;
            var validLanguage = 1;
            var validSubmit = 1;
            var validCategory = 1;
            var validGenre = 1;
            var validShoting = 1;
            var validYear = 1;
            var validDirection = 1;
            var validDirectionAsist = 1;
            var validProduction = 1;
            var validProductionAssistant = 1;
            var validCamara = 1;
            var validCamaraAsist = 1;
            var validContinuista = 1;
            var validScript = 1;
            var validPhotograficDirection = 1;
            var validArt = 1;
            var validSonorousRegister = 1;
            var validMusic = 1;
            var validImagePostproduction = 1;
            var validSoundPostproduction = 1;
            var validCasting = 1;
            var validMounting = 1;
            var validCatering = 1;
            var validDescription = 1;
            var validActors = 1;

            j('#name').on('input',function(e){
                checkName();
            });
            j('#language').change(function() {
              checkLanguage();
            });
            j('#asignatura_id').change(function() {
              checkSubmit();
            });
            j('#category').change(function() {
              checkCategory();
            });
            j('#category2').change(function() {
              checkGenre();
            });
             j('#shooting_format').change(function() {
              checkShooting();
            });
            j('#production_year').change(function() {
              checkProductionYear();
            });

            j('#direction').on('input',function(e){
                checkDirection();
            });
            j('#direction_assistant').on('input',function(e){
                checkDirectionAssistant();
            });
            j('#production').on('input',function(e){
                checkProduction();
            });
            j('#production_assistant').on('input',function(e){
                checkProductionAssistant();
            });
            j('#camara').on('input',function(e){
                checkCamara();
            });
            j('#camara_assistant').on('input',function(e){
                checkCamaraAssistant();
            });
            j('#continuista').on('input',function(e){
                checkContinuista();
            });
            j('#script').on('input',function(e){
                checkScript();
            });
            j('#photografic_direction').on('input',function(e){
                checkPhotograficDirection();
            });
            j('#art_direction').on('input',function(e){
                checkArtDirection();
            });
            j('#sonorous_register').on('input',function(e){
                checkSonorousRegister();
            });
            j('#music').on('input',function(e){
                checkMusic();
            });
            j('#image_postproduction').on('input',function(e){
                checkImagePostproduction();
            });
            j('#sound_postproduction').on('input',function(e){
                checkSoundPostproduction();
            });
            j('#casting').on('input',function(e){
                checkCasting();
            });
            j('#mounting').on('input',function(e){
                checkMounting();
            });
            j('#catering').on('input',function(e){
                checkCatering();
            });
            j('#description').on('input',function(e){
                checkDescription();
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
                checkForm();
            }
            function checkCreationDate(){
                var creation_date = j('#creation_date').val();
                var BLIDRegExpression = /^[0-9\-]+$/;
                if(creation_date.length == 0){
                    document.getElementById("dateValidation").style.display = "inline";
                    document.getElementById("dateValidation").innerHTML = 'El Campo Contiene Caracteres Invalidos';
                    validCreationDate = 0;
                }else if (!BLIDRegExpression.test(creation_date)) {
                    document.getElementById("dateValidation").style.display = "inline";
                    document.getElementById("dateValidation").innerHTML = 'El Campo Contiene Caracteres Invalidos';
                    validCreationDate = 0;
                }else{
                    document.getElementById("dateValidation").style.display = "none";
                    validCreationDate = 1;
                }
                checkForm();
            }
            function checkLanguage(){
                var language = j('#language').val();
                if(language.length == 0){
                    document.getElementById("languageValidation").style.display = "inline";
                    document.getElementById("languageValidation").innerHTML = 'Campo Obligatorio';
                    validLanguage = 0;
                }else if (language == "") {
                    document.getElementById("languageValidation").style.display = "inline";
                    document.getElementById("languageValidation").innerHTML = 'Campo Obligatorio';
                    validLanguage = 0;
                }else{
                    document.getElementById("languageValidation").style.display = "none";
                    validLanguage = 1;
                }
                checkForm();
            }
            function checkSubmit(){
                var submit = j('#asignatura_id').val();
                if(submit.length == 0){
                    document.getElementById("subjectValidation").style.display = "inline";
                    document.getElementById("subjectValidation").innerHTML = 'Campo Obligatorio';
                    validSubmit = 0;
                }else if (submit == "") {
                    document.getElementById("subjectValidation").style.display = "inline";
                    document.getElementById("subjectValidation").innerHTML = 'Campo Obligatorio';
                    validSubmit = 0;
                }else{
                    document.getElementById("subjectValidation").style.display = "none";
                    validSubmit = 1;
                }
                checkForm();
            }
            function checkCategory(){
                var category = j('#category').val();
                if(category.length == 0){
                    document.getElementById("categoryValidation").style.display = "inline";
                    document.getElementById("categoryValidation").innerHTML = 'Campo Obligatorio';
                    validCategory = 0;
                }else if (category == "") {
                    document.getElementById("categoryValidation").style.display = "inline";
                    document.getElementById("categoryValidation").innerHTML = 'Campo Obligatorio';
                    validCategory = 0;
                }else{
                    document.getElementById("categoryValidation").style.display = "none";
                    validCategory = 1;
                }
                checkForm();
            }
            function checkGenre(){
                var category2 = j('#category2').val();
                if(category2.length == 0){
                    document.getElementById("genreValidation").style.display = "inline";
                    document.getElementById("genreValidation").innerHTML = 'Campo Obligatorio';
                    validGenre = 0;
                }else if (category2 == "") {
                    document.getElementById("genreValidation").style.display = "inline";
                    document.getElementById("genreValidation").innerHTML = 'Campo Obligatorio';
                    validGenre = 0;
                }else{
                    document.getElementById("genreValidation").style.display = "none";
                    validGenre = 1;
                }
                checkForm();
            }
            function checkShooting(){
                var shooting_format = j('#shooting_format').val();
                if(shooting_format.length == 0){
                    document.getElementById("shootingValidation").style.display = "inline";
                    document.getElementById("shootingValidation").innerHTML = 'Campo Obligatorio';
                    validShoting = 0;
                }else if (shooting_format == "") {
                    document.getElementById("shootingValidation").style.display = "inline";
                    document.getElementById("shootingValidation").innerHTML = 'Campo Obligatorio';
                    validShoting = 0;
                }else{
                    document.getElementById("shootingValidation").style.display = "none";
                    validShoting = 1;
                }
                checkForm();
            }
            function checkProductionYear(){
                var production_year = j('#production_year').val();
                if(production_year.length == 0){
                    document.getElementById("yearValidation").style.display = "inline";
                    document.getElementById("yearValidation").innerHTML = 'Campo Obligatorio';
                    validYear = 0;
                }else if (production_year == "") {
                    document.getElementById("yearValidation").style.display = "inline";
                    document.getElementById("yearValidation").innerHTML = 'Campo Obligatorio';
                    validYear = 0;
                }else{
                    document.getElementById("yearValidation").style.display = "none";
                    validYear = 1;
                }
                checkForm();
            }
            function checkDirection(){
                var direction = j('#direction').val();
                var BLIDRegExpression = /^[a-zA-Z0-9\ \-\_\:\;\¿\?\!\,\.\Ñ\ñ\u00C0-\u017F]+$/;
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
                checkForm();
            }
            function checkDirectionAssistant(){
                var direction_assistant = j('#direction_assistant').val();
                var BLIDRegExpression = /^[a-zA-Z0-9\ \-\_\:\;\¿\?\!\,\.\Ñ\ñ\u00C0-\u017F]+$/;
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
                checkForm();
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
                checkForm();
            }
            function checkProductionAssistant(){
                var production_assistant = j('#production_assistant').val();
                var BLIDRegExpression = /^[a-zA-Z0-9\ \_\-\:\;\¿\?\!\,\.\Ñ\ñ\u00C0-\u017F]+$/;
                if(production_assistant.length == 0){
                    document.getElementById("productionAssistantValidation").style.display = "inline";
                    document.getElementById("productionAssistantValidation").innerHTML = 'Campo Obligatorio';
                    validProductionAssistant = 0;
                }else if (!BLIDRegExpression.test(production_assistant)) {
                    document.getElementById("productionAssistantValidation").style.display = "inline";
                    document.getElementById("productionAssistantValidation").innerHTML = 'El Campo Contiene Caracteres Invalidos';
                    validProductionAssistant = 0;
                }else{
                    document.getElementById("productionAssistantValidation").style.display = "none";
                    validProductionAssistant = 1;
                }
                checkForm();
               
            }
            function checkCamara(){
                var camara = j('#camara').val();
                var BLIDRegExpression = /^[a-zA-Z0-9\ \-\_\:\;\¿\?\!\,\.\Ñ\ñ\u00C0-\u017F]+$/;
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
                checkForm();
            }
            function checkCamaraAssistant(){
                var camara_assistant = j('#camara_assistant').val();
                var BLIDRegExpression = /^[a-zA-Z0-9\ \-\_\:\;\¿\?\!\,\.\Ñ\ñ\u00C0-\u017F]+$/;
                if (camara_assistant.length == 0){
                    document.getElementById("camaraAssistantValidation").style.display = "none";
                    validCamaraAsist = 1;
                }else if (!BLIDRegExpression.test(camara_assistant)) {
                    document.getElementById("camaraAssistantValidation").style.display = "inline";
                    document.getElementById("camaraAssistantValidation").innerHTML = 'El Campo Contiene Caracteres Invalidos';
                    validCamaraAsist = 0;
                }else {
                    document.getElementById("camaraAssistantValidation").style.display = "none";
                    validCamaraAsist = 1;
                }
                checkForm();
            }
            function checkContinuista(){
                var continuista = j('#continuista').val();
                var BLIDRegExpression = /^[a-zA-Z0-9\ \-\_\:\;\¿\?\!\,\.\Ñ\ñ\u00C0-\u017F]+$/;
                 if (continuista.length == 0){
                    document.getElementById("continuistaValidation").style.display = "none";
                    validContinuista = 1;
                }else if (!BLIDRegExpression.test(continuista)) {
                    document.getElementById("continuistaValidation").style.display = "inline";
                    document.getElementById("continuistaValidation").innerHTML = 'El Campo Contiene Caracteres Invalidos';
                    validContinuista = 0;
                }else{
                    document.getElementById("continuistaValidation").style.display = "none";
                    validContinuista = 1;
                }
                checkForm();
            }
            function checkScript(){
                var script = j('#script').val();
                var BLIDRegExpression = /^[a-zA-Z0-9\ \-\_\:\;\¿\?\!\,\.\Ñ\ñ\u00C0-\u017F]+$/;
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
                checkForm();
            }
            function checkPhotograficDirection(){
                var photografic_direction = j('#photografic_direction').val();
                var BLIDRegExpression = /^[a-zA-Z0-9\ \-\_\:\;\¿\?\!\,\.\Ñ\ñ\u00C0-\u017F]+$/;
                if (photografic_direction.length == 0){
                    document.getElementById("photograficDirectionValidation").style.display = "none";
                    validPhotograficDirection = 1;
                }else if (!BLIDRegExpression.test(photografic_direction)) {
                    document.getElementById("photograficDirectionValidation").style.display = "inline";
                    document.getElementById("photograficDirectionValidation").innerHTML = 'El Campo Contiene Caracteres Invalidos';
                    validPhotograficDirection = 0;
                }else{
                    document.getElementById("photograficDirectionValidation").style.display = "none";
                    validPhotograficDirection = 1;
                }
                checkForm();
            }
            function checkArtDirection(){
                var art_direction = j('#art_direction').val();
                var BLIDRegExpression = /^[a-zA-Z0-9\ \-\_\:\;\¿\?\!\,\.\Ñ\ñ\u00C0-\u017F]+$/;
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
                checkForm();
            }
            function checkSonorousRegister(){
               var sonorous_register = j('#sonorous_register').val();
                var BLIDRegExpression = /^[a-zA-Z0-9\ \-\_\:\;\¿\?\!\,\.\Ñ\ñ\u00C0-\u017F]+$/;
                if(sonorous_register.length == 0){
                    document.getElementById("sonorousRegisterValidation").style.display = "inline";
                    document.getElementById("sonorousRegisterValidation").innerHTML = 'Campo Obligatorio';
                    validSonorousRegister = 0;
                }else if (!BLIDRegExpression.test(sonorous_register)) {
                    document.getElementById("sonorousRegisterValidation").style.display = "inline";
                    document.getElementById("sonorousRegisterValidation").innerHTML = 'El Campo Contiene Caracteres Invalidos';
                    validSonorousRegister = 0;
                }else{
                    document.getElementById("sonorousRegisterValidation").style.display = "none";
                    validSonorousRegister = 1;
                }
                checkForm();
            }
            function checkMusic(){
                var music = j('#music').val();
                var BLIDRegExpression = /^[a-zA-Z0-9\ \-\_\:\;\¿\?\!\,\.\Ñ\ñ\u00C0-\u017F]+$/;
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
                checkForm();
            }
            function checkImagePostproduction(){
                var image_postproduction = j('#image_postproduction').val();
                var BLIDRegExpression = /^[a-zA-Z0-9\ \-\_\:\;\¿\?\!\,\.\Ñ\ñ\u00C0-\u017F]+$/;
                if(image_postproduction.length == 0){
                    document.getElementById("imagePostValidation").style.display = "inline";
                    document.getElementById("imagePostValidation").innerHTML = 'Campo Obligatorio';
                    validImagePostproduction = 0;
                }else if (!BLIDRegExpression.test(image_postproduction)) {
                    document.getElementById("imagePostValidation").style.display = "inline";
                    document.getElementById("imagePostValidation").innerHTML = 'El Campo Contiene Caracteres Invalidos';
                    validImagePostproduction = 0;
                }else{
                    document.getElementById("imagePostValidation").style.display = "none";
                    validImagePostproduction = 1;
                }
                checkForm();
               
            }
            function checkSoundPostproduction(){
                var sound_postproduction = j('#sound_postproduction').val();
                var BLIDRegExpression = /^[a-zA-Z0-9\ \-\_\:\;\¿\?\!\,\.\Ñ\ñ\u00C0-\u017F]+$/;
                if(sound_postproduction.length == 0){
                    document.getElementById("soundPostValidation").style.display = "inline";
                    document.getElementById("soundPostValidation").innerHTML = 'Campo Obligatorio';
                    validSoundPostproduction = 0;
                }else if (!BLIDRegExpression.test(sound_postproduction)) {
                    document.getElementById("soundPostValidation").style.display = "inline";
                    document.getElementById("soundPostValidation").innerHTML = 'El Campo Contiene Caracteres Invalidos';
                    validSoundPostproduction = 0;
                }else{
                    document.getElementById("soundPostValidation").style.display = "none";
                    validSoundPostproduction = 1;
                }
                checkForm();
            }
            function checkCasting(){
                var casting = j('#casting').val();
                var BLIDRegExpression = /^[a-zA-Z0-9\ \-\_\:\;\¿\?\!\,\.\Ñ\ñ\u00C0-\u017F]+$/;
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
                checkForm();
            }
            function checkMounting(){
                var mounting = j('#mounting').val();
                var BLIDRegExpression = /^[a-zA-Z0-9\ \-\_\:\;\¿\?\!\,\.\Ñ\ñ\u00C0-\u017F]+$/;
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
                checkForm();
            }
            function checkCatering(){
               var catering = j('#catering').val();
                var BLIDRegExpression = /^[a-zA-Z0-9\ \_\-\:\;\¿\?\!\,\.\Ñ\ñ\u00C0-\u017F]+$/;
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
                checkForm();
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
                checkForm();
            }
            function checkActors(){
                var actors = j('#actors').val();
                var BLIDRegExpression = /^[a-zA-Z0-9\ \-\_\:\;\¿\?\!\,\.\Ñ\ñ\u00C0-\u017F]+$/;
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
                checkForm();
            }

            function checkForm() {
            if(
                validName == 0 || 
                validCreationDate == 0 || 
                validLanguage == 0 || 
                validSubmit == 0 || 
                validCategory == 0 || 
                validGenre == 0 || 
                validShoting == 0 || 
                validYear == 0 || 
                validDirection == 0 || 
                validDirectionAsist == 0 || 
                validProduction == 0 || 
                validProductionAssistant == 0 || 
                validCamara == 0 || 
                validCamaraAsist == 0 || 
                validContinuista == 0 || 
                validScript == 0 || 
                validPhotograficDirection == 0 ||
                validArt == 0 ||
                validSonorousRegister == 0 || 
                validMusic == 0 ||
                validImagePostproduction == 0 ||
                validSoundPostproduction == 0 ||
                validCasting == 0 ||
                validMounting == 0 ||
                validCatering == 0 ||
                validDescription == 0 ||
                validActors == 0
                ){
                j(".sendButton").attr('class', 'btn btn-primary disabled sendButton orangeButton');
                document.getElementById("sendValidation").style.display = "inline";
                document.getElementById("sendValidation").innerHTML = "Se deben completar todos los campos marcados como obligatorios para enviar el formulario Pendientes: <br> "+" validName "+validName+" validCreationDate "+ validCreationDate+" validLanguage "+validLanguage+" validSubmit "+validSubmit+" validCategory "+validCategory+" validGenre "+validGenre+" validShoting "+validShoting+" validYear "+validYear+" validDirection "+validDirection+" validDirectionAsist "+validDirectionAsist+" validProduction "+validProduction+" validProductionAssistant "+validProductionAssistant+" validCamara "+validCamara+" validCamaraAsist "+validCamaraAsist+" validContinuista "+validContinuista+" validScript "+validScript+" validPhotograficDirection "+validPhotograficDirection+" validArt "+validArt+" validSonorousRegister "+validSonorousRegister+" validMusic "+validMusic+" validImagePostproduction "+validImagePostproduction+" validSoundPostproduction "+validSoundPostproduction+" validCasting "+validCasting+" validMounting "+validMounting+" validCatering "+validCatering+" validDescription "+validDescription+" validActors "+validActors;
            }
            if(
                validName == 1 &&
                validCreationDate == 1 &&
                validLanguage == 1 &&
                validSubmit == 1 &&
                validCategory == 1 &&
                validGenre == 1 &&
                validShoting == 1 &&
                validYear == 1 &&
                validDirection == 1 &&
                validDirectionAsist == 1 &&
                validProduction == 1 &&
                validProductionAssistant == 1 &&
                validCamara == 1 &&
                validCamaraAsist == 1 &&
                validContinuista == 1 &&
                validScript == 1 &&
                validPhotograficDirection == 1 &&
                validArt == 1 &&
                validSonorousRegister == 1 &&
                validMusic == 1 &&
                validImagePostproduction == 1 &&
                validSoundPostproduction == 1 &&
                validCasting == 1 &&
                validMounting == 1 &&
                validCatering == 1 &&
                validDescription == 1 &&
                validActors == 1){
                j(".sendButton").attr('class', 'btn btn-primary active sendButton orangeButton');
                document.getElementById("sendValidation").style.display = "none";
            }
        }              

        </script>
        @stop