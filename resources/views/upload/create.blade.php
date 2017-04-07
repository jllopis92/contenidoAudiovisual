@extends('layouts.controlPanel')

@section('content')

    @if (!Auth::guest())
        @if ((Auth::user()->tipo == "profesor") || (Auth::user()->tipo == "alumno") || (Auth::user()->tipo == "administrador"))
        <div class="col-sm-10 col-sm-offset-1" style="overflow: hidden; 
        background-color: #f8f8f8;
    border-color: #e7e7e7;">
            <h3 class="orangeAndBoldText" style="margin-bottom: 30px;" align="center">Subir Video</h3>

            {!! Form::open(['id' => 'newVideo', 'route' =>'upload.store', 'method'=>'POST', 'files'=> true, 'data-parsley-validate'=>'' ]) !!}
                {{-- para Mac --}}
                {{-- <input type="hidden" name="_token" value="{{ csrf_token() }}"> --}}
                {{-- para centOs --}}
                <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">

            <div class="col-xs-12">
                 <h4 class="blackAndBoldText">Información Importante</h4>

                 <div class = "form-group col-xs-12" style ="display: none;">
                    {!! Form::label('usuario_id', 'usuario_id:') !!}
                    {!! Form::text('usuario_id', Auth::user()->id) !!}
                </div>

                <div class = "form-group col-xs-12" style ="display: none;">
                    {!! Form::label('state', 'State:') !!}
                    @if (Auth::user()->tipo == "alumno")
                    {!! Form::text('state', 3) !!}
                    @else
                    {!! Form::text('state', 1) !!}
                    @endif
                </div>
                <div class="col-xs-12">
                    <div class = "form-group col-sm-12 col-md-6">
                        {!! Form::label('name', 'Nombre * :') !!}
                        {!! Form::text('name', null, ['class'=> 'form-control', 'required'=> '']) !!}
                        <div class="alert alert-danger col-xs-12" id="nameValidation" style="display: none">
                        </div>
                    </div>
                    <div class = "form-group col-sm-12 col-md-6">
                        {!! Form::label('creation_date', 'Fecha Creación * :') !!}
                        <input type="text" id="creation_date" name="creation_date" class="form-control">
                        <div class="alert alert-danger col-xs-12" id="dateValidation" style="display: none">
                        </div>
                    </div>
                </div>
                <div class="col-xs-12">
                    
                    <div class = "form-group col-sm-12 col-md-6">
                        <div class = "form-group">
                            {!! Form::label('imageRef', 'Imagen Referencial de Video: *') !!}
                            <input id="imageRef" name="imageRef" type="file" accept=".jpg,.jpeg,.png" />
                        </div>
                    </div>

                    <div class = "form-group col-sm-12 col-md-6">
                        <div class = "form-group">
                            {!! Form::label('advertisingImage', 'Imagen para Anuncios: *') !!}
                            <input id="advertisingImage" name="advertisingImage" type="file" accept=".jpg,.jpeg,.png" />
                        </div>
                    </div>
                </div>

                <div class = "form-group col-xs-12">
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
                    
                     <p> Formatos de video soportados: mp4,webm,avi,ogv,mkv</p>
                </div>

                <div class = "form-group col-xs-12">
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
                    <p> Formatos de trailer soportados: mp4,webm,avi,ogv,mkv</p>
                </div>
                <div class="col-xs-12">
                    <div class = "form-group col-sm-12 col-md-6">
                        {!! Form::label('language', 'Idioma * :') !!}
                        {!! Form::select('language', Config::get('enums.languages'), ['required'=> '', 'data-parsley-mincheck'=> 1]) !!}
                        <div class="alert alert-danger col-xs-12" id="languageValidation" style="display: none">
                        </div>
                    </div>

                    <div class = "form-group col-sm-12 col-md-6">

                        {!! Form::label('cant_sub', 'Cantidad de Subtitulos:') !!}
                        <input id="cant_sub" value="0" type="number" min="0" max="5" class="form-control">
                        <div id="result"></div>
                    </div>
                    <p> El formato de subtítulos aceptado es .vtt, para adaptar un subtítulo a este formato, se recomenda utilizar <a style="font-size: 14px; color: #333;" href="https://atelier.u-sub.net/srt2vtt/" target="_blank"> este enlace web.</a></p>
                </div>
                <div class="col-xs-12">
                    <div id="subtittle_1" class = "form-group col-sm-12 col-md-6" style ="display: none;">
                        <label>Subtitulo 1</label>
                        <div class = "col-xs-12">
                            {!! Form::label('language_1', 'Idioma * :') !!}
                            {!! Form::select('language_1', Config::get('enums.languages'), ['required'=> '', 'data-parsley-mincheck'=> 1]) !!}
                        </div>
                        <div class = "form-group col-md-12" >
                            {!! Form::label('subtitle_1', 'Subtitulos:') !!}
                            <input id="subtitle_1" name="subtitle_1" type="file" accept=".vtt" />
                        
                        </div>
                    </div>
                    <div id="subtittle_2" class = "form-group col-sm-12 col-md-6" style ="display: none;">
                        <label>Subtitulo 2</label>
                        <div class = "col-xs-12">
                            {!! Form::label('language_2', 'Idioma * :') !!}
                            {!! Form::select('language_2', Config::get('enums.languages'), ['required'=> '', 'data-parsley-mincheck'=> 1]) !!}
                        </div>
                        <div class = "form-group col-md-12" >
                            {!! Form::label('subtitle_2', 'Subtitulos:') !!}
                            <input id="subtitle_2" name="subtitle_2" type="file" accept=".vtt" />
                        </div>
                    </div>
                </div>
                <div class="col-xs-12">
                    <div id="subtittle_3" class = "form-group col-sm-12 col-md-6" style ="display: none;">
                        <label>Subtitulo 3</label>
                        <div class = "col-xs-12">
                            {!! Form::label('language_3', 'Idioma * :') !!}
                            {!! Form::select('language_3', Config::get('enums.languages'), ['required'=> '', 'data-parsley-mincheck'=> 1]) !!}
                        </div>
                        <div class = "form-group col-md-12" >
                            {!! Form::label('subtitle_3', 'Subtitulos:') !!}
                            <input id="subtitle_3" name="subtitle_3" type="file" accept=".vtt" />
                        </div>
                    </div>
                    <div id="subtittle_4" class = "form-group col-sm-12 col-md-6" style ="display: none;">
                        <label>Subtitulo 4</label>
                        <div class = "col-xs-12">
                            {!! Form::label('language_4', 'Idioma * :') !!}
                            {!! Form::select('language_4', Config::get('enums.languages'), ['required'=> '', 'data-parsley-mincheck'=> 1]) !!}
                        </div>
                        <div class = "form-group col-md-12" >
                            {!! Form::label('subtitle_4', 'Subtitulos:') !!}
                            <input id="subtitle_4" name="subtitle_4" type="file" accept=".vtt" />
                        </div>
                    </div>
                </div>
                <div class = "col-xs-12">
                    <div id="subtittle_5" class = "form-group col-sm-12 col-md-6" style ="display: none;">
                        <label>Subtitulo 5</label>
                        <div class = "col-xs-12">
                            {!! Form::label('language_5', 'Idioma * :') !!}
                            {!! Form::select('language_5', Config::get('enums.languages'), ['required'=> '', 'data-parsley-mincheck'=> 1]) !!}
                        </div>
                        <div class = "form-group col-md-12" >
                            {!! Form::label('subtitle_5', 'Subtitulos:') !!}
                            <input id="subtitle_5" name="subtitle_5" type="file" accept=".vtt" />
                        </div>
                    </div>
                </div>
                <div class = "col-xs-12">
                    <div class = "form-group col-sm-12 col-md-6">
                        {!! Form::label('trailer_subtitle', 'Subtitulos de Trailer:') !!}
                        <input id="trailer_subtitle" name="trailer_subtitle" type="file" accept=".vtt" />
                    </div>

                    <div class = "form-group col-sm-12 col-md-6">
                        {!! Form::label('asignatura_id', 'Asignatura * :') !!}
                        {!! Form::select('asignatura_id', $subject) !!}
                    </div>
                </div>
            </div>

            <div class="col-xs-12">
                <hr>
                <h4 class="blackAndBoldText">Categorias de Video</h4>
                <div class = "form-group col-xs-12">
                    <div class = "col-xs-12">
                        <div class="colums col-sm-12 col-md-6">
                            {!! Form::label('category', 'Categoria * :') !!}
                            {{-- @foreach($types as $key=>$type)
                                @if($key == 0)
                                    <p>
                                        {{$type->name}}<input name="category" id="{{$type->id}}" value="{{$type->id}}" required="" type="radio">
                                    </p>
                                @else
                                     <p>
                                        {{$type->name}}<input name="category" id="{{$type->id}}" value="{{$type->id}}" type="radio">
                                    </p>
                                @endif
                            @endforeach --}}
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
                        </div>
                        <div class="colums col-sm-12 col-md-6">
                            {!! Form::label('category2', 'Genero * :') !!}
                            {{-- @foreach($genres as $genre)
                                @if($key == 0)
                                    <p>
                                    {{$genre->name}}<input name="category" id="{{$genre->id}}" value="{{$genre->id}}" required="" type="radio">
                                    </p>
                                @else
                                    <p>
                                    {{$genre->name}}<input name="category" id="{{$genre->id}}" value="{{$genre->id}}" type="radio">
                                    </p>
                                @endif
                            @endforeach --}}
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
                </div>
                <div class = "col-xs-12">
                    <div class = "form-group col-sm-12 col-md-6">
                        {!! Form::label('shooting_format', 'Formato de Rodaje * :') !!}
                        {!!Form::select('shooting_format', Config::get('enums.shooting_format_types'))!!}
                        <div class="alert alert-danger col-xs-12" id="genreValidation" style="display: none"></div>
                    </div>
                    <div class = "form-group col-sm-12 col-md-6">
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
                </div>
            </div> 

            <div class="col-xs-12">
                <hr>
                <h4 class="blackAndBoldText">Información Complementaria</h4>
                <div class = "col-xs-12">
                    <div class = "form-group col-sm-12 col-md-6">
                        {!! Form::label('direction', 'Dirección * :') !!}
                        {!! Form::text('direction', null, ['class'=> 'form-control']) !!}
                        <br>
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
                <div class = "col-xs-12">
                    <div class = "form-group col-sm-12 col-md-6">
                        {!! Form::label('production', 'Producción * :') !!}
                        {!! Form::text('production', null, ['class'=> 'form-control', 'required'=> '']) !!}
                        <div class="alert alert-danger col-xs-12" id="productionValidation" style="display: none">
                        </div>
                    </div>

                    <div class = "form-group col-sm-12 col-md-6">
                        {!! Form::label('production_assistant', 'Asistente de Producción * :') !!}
                        {!! Form::text('production_assistant', null, ['class'=> 'form-control', 'required'=> '']) !!}
                        <div class="alert alert-danger col-xs-12" id="AsisProductionValidation" style="display: none">
                        </div>
                    </div>
                </div>
                <div class = "col-xs-12">
                    <div class = "form-group col-sm-12 col-md-6">
                        {!! Form::label('camara', 'Camara * :') !!}
                        {!! Form::text('camara', null, ['class'=> 'form-control', 'required'=> '']) !!}
                        <div class="alert alert-danger col-xs-12" id="camaraValidation" style="display: none">
                        </div>
                    </div>
                    <div class = "form-group col-sm-12 col-md-6">
                        {!! Form::label('camara_assistant', 'Asistente de Camara:') !!}
                        {!! Form::text('camara_assistant', null, ['class'=> 'form-control']) !!}
                        <div class="alert alert-danger col-xs-12" id="camaraAsistValidation" style="display: none">
                        </div>
                    </div>
                </div>
                <div class = "col-xs-12">
                    <div class = "form-group col-sm-12 col-md-6">
                        {!! Form::label('continuista', 'Continuista:') !!}
                        {!! Form::text('continuista', null, ['class'=> 'form-control']) !!}
                        <div class="alert alert-danger col-xs-12" id="continusValidation" style="display: none">
                        </div>
                    </div>

                    <div class = "form-group col-sm-12 col-md-6">
                        {!! Form::label('script', 'Guión * :') !!}
                        {!! Form::text('script', null, ['class'=> 'form-control', 'required'=> '']) !!}
                        <div class="alert alert-danger col-xs-12" id="scriptValidation" style="display: none">
                        </div>
                    </div>
                </div>
                <div class = "col-xs-12">
                    <div class = "form-group col-sm-12 col-md-6">
                        {!! Form::label('photografic_direction', 'Dirección de Fotografia:') !!}
                        {!! Form::text('photografic_direction', null, ['class'=> 'form-control']) !!}
                        <div class="alert alert-danger col-xs-12" id="photoValidation" style="display: none">
                        </div>
                    </div>

                    <div class = "form-group col-sm-12 col-md-6">
                        {!! Form::label('art_direction', 'Dirección de Arte:') !!}
                        {!! Form::text('art_direction', null, ['class'=> 'form-control']) !!}
                        <div class="alert alert-danger col-xs-12" id="artValidation" style="display: none">
                        </div>
                    </div>
                </div>
                <div class = "col-xs-12">
                    <div class = "form-group col-sm-12 col-md-6">
                        {!! Form::label('sonorous_register', 'Registro Sonoro * :') !!}
                        {!! Form::text('sonorous_register', null, ['class'=> 'form-control', 'required'=> '']) !!}
                        <div class="alert alert-danger col-xs-12" id="sonorousValidation" style="display: none">
                        </div>
                    </div>

                    <div class = "form-group col-sm-12 col-md-6">
                        {!! Form::label('music', 'Música:') !!}
                        {!! Form::text('music', null, ['class'=> 'form-control']) !!}
                        <div class="alert alert-danger col-xs-12" id="musicValidation" style="display: none">
                        </div>
                    </div>
                </div>
                <div class = "col-xs-12">
                    <div class = "form-group col-sm-12 col-md-6">
                        {!! Form::label('image_postproduction', 'Post-produccion de Imagen * :') !!}
                        {!! Form::text('image_postproduction', null, ['class'=> 'form-control', 'required'=> '']) !!}
                        <div class="alert alert-danger col-xs-12" id="imgValidation" style="display: none">
                        </div>
                    </div>
                    <div class = "form-group col-sm-12 col-md-6">
                        {!! Form::label('sound_postproduction', 'Post-produccion de Sonido * :') !!}
                        {!! Form::text('sound_postproduction', null, ['class'=> 'form-control', 'required'=> '']) !!}
                        <div class="alert alert-danger col-xs-12" id="soundValidation" style="display: none">
                        </div>
                    </div>
                </div>

                <div class = "col-xs-12">
                    <div class = "form-group col-sm-12 col-md-6">
                        {!! Form::label('casting', 'Casting:') !!}
                        {!! Form::text('casting', null, ['class'=> 'form-control']) !!}
                        <div class="alert alert-danger col-xs-12" id="castingValidation" style="display: none">
                        </div>
                    </div>
                    <div class = "form-group col-sm-12 col-md-6">
                        {!! Form::label('mounting', 'Montaje * :') !!}
                        {!! Form::text('mounting', null, ['class'=> 'form-control', 'required'=> '']) !!}
                        <div class="alert alert-danger col-xs-12" id="mountingValidation" style="display: none">
                        </div>
                    </div>
                </div>
            
                <div class = "col-xs-12">
                    <div class = "form-group col-sm-12 col-md-6">
                        {!! Form::label('catering', 'Catering:') !!}
                        {!! Form::text('catering', null, ['class'=> 'form-control']) !!}
                        <div class="alert alert-danger col-xs-12" id="cateringValidation" style="display: none">
                        </div>
                    </div>

                    <div class = "form-group col-xs-12">
                            {!! Form::label('description', 'Descripción * :') !!}
                            {!! Form::textarea('description', null, ['class'=> 'form-control', 'required'=> '']) !!}
                            <br>
                            <div class="alert alert-danger col-xs-12" id="descriptionValidation" style="display: none">
                            </div>
                    </div>
                </div>

                <div class = "col-xs-12">
                    <div class = "form-group col-xs-12">
                        {!! Form::label('actors', 'Actores * :') !!}
                        {!! Form::textarea('actors', null, ['class'=> 'form-control', 'required'=> '']) !!}
                        <div class="alert alert-danger col-xs-12" id="actorsValidation" style="display: none">
                        </div>
                    </div>
                    <div class = "form-group col-xs-12">
                        <label>¿Desea agregar nuevos Campos?</label>
                        <br>
                        {!! Form::label('cant_other', 'Cantidad :') !!}
                        <input id="cant_other" value="0" type="number" min="0" max="3" class="form-control">
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
            </div> 

            <div class = "form-group col-md-12">
                <div class="colums">
                    {!! Form::submit('Registrar',['class' =>'btn btn-primary disabled sendButton orangeButton', 'value' =>'validate']) !!}
                    {!! Form::close() !!}
                    <br>
                    <div class="col-md-12" id="load_bar" style="display: none">
                        <img src="images/loading.gif" title="loading" style="width: 70px; height: 70px;"/>
                        <p class="orangeAndBoldText"> Cargando</p>
                    </div>
                    <br>
                    <p class="text-danger" id="sendValidation"> Se deben completar todos los campos marcados como obligatorios para enviar el formulario. </p>
                    <p class="text-danger" id="warning"> Es posible que la página tarde en subir archivos debido al tamaño de estos, en ese caso, se solicita esperar a que el sistema termine el procesamiento. </p>
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

            j( "#cant_other" ).on( "change", function() {
                if(j("#cant_other").val() > 3){
                    alert("Máximo de 3 nuevas categorias")
                    j("#cant_other").val(3);
                }else if(j("#cant_other").val() < 0){
                    j("#cant_other").val(0);
                }else if ((j("#cant_other").val() <= 3) && (j("#cant_other").val() > 0)){
                    var subs = j("#cant_other").val();
                    for(var x=1; x<=3; x++){
                        if(x<=subs){
                            document.getElementById("other" + x).style.display="inline";
                        }else{
                            document.getElementById("other" + x).style.display="none";
                        }
                    }
                }else{
                    for(var y=1; y<=3; y++){
                        document.getElementById("other" + y).style.display="none";
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
            j('#creation_date').datepicker()
                .on("input change", function (e) {
                checkCreationDate();
            });
        });

    </script>

    <script type="text/javascript">
        /**
        Script para validacion de campos en formulario
        **/
        var j = jQuery.noConflict();

        var validName = 0;
        var validDescription = 0;
        var validImageFile = 1;
        var validTrailerFile = 0;
        var validVideoFile = 0;
        var validCategory = 0;
        var validGenre = 0;
        var validCreationDate = 0;
        var validDirection = 0;
        var validDirectionAsist = 1;
        var validCasting = 1;
        var validContinuista = 1;
        var validScript = 0;
        var validProduction = 0;
        var validProductionAssistant = 0;
        var validPhotograficDirection = 1;
        var validCamara = 0;
        var validCamaraAsist = 1;
        var validArt = 1;
        var validSonorousRegister = 0;
        var validMounting = 0;
        var validImagePostproduction = 0;
        var validSoundPostproduction = 0;
        var validCatering = 1;
        var validMusic = 1;
        var validActors = 0;

        var cant_other = j('#cant_other').val();
            
        j('#name').on('input',function(e){
            checkName();
        });
        j('#description').on('input',function(e){
            checkDescription();
        });
        j("#largometraje").change(function(e) {
            checkCategory("largometraje");    
        });
        j("#mediometraje").change(function(e) {
            checkCategory("mediometraje");    
        });
        j("#cortometraje").change(function(e) {
            checkCategory("cortometraje");    
        });
        j("#experimental").change(function(e) {
            checkCategory2("experimental");    
        });
        j("#ficcion").change(function(e) {
            checkCategory2("ficcion");    
        });
        j("#animacion").change(function(e) {
            checkCategory2("animacion");    
        });
        j("#documental").change(function(e) {
            checkCategory2("documental");    
        });
        
        /*j('#creation_date').on('click',function(e){
            checkCreationDate();
        });*/
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
        j('.sendButton').on('click',function(e){
            document.getElementById("load_bar").style.display="inline";
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
        function checkCategory(option){
            var category = j('#' + option).val();
            if(category.length == 0){
                document.getElementById("categoryValidation").style.display = "inline";
                document.getElementById("categoryValidation").innerHTML = 'Campo Obligatorio';
               validCategory = 0;
            }else{
                document.getElementById("categoryValidation").style.display = "none";
                validCategory = 1;
            }
            checkForm();
        }
        function checkCategory2(option){
            var category2 = j('#' + option).val();
            if(category2.length == 0){
                document.getElementById("genreValidation").style.display = "inline";
                document.getElementById("genreValidation").innerHTML = 'Campo Obligatorio';
               validGenre = 0;
            }else{
                document.getElementById("genreValidation").style.display = "none";
                validGenre = 1;
            }
            checkForm();
        }

        function checkCreationDate(){
            var creation_date = j('#creation_date').val();
            var BLIDRegExpression = /^[0-9\-]+$/;
            if(creation_date.length == 0){
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
        function checkDirection(){
            var direction = j('#direction').val();
            var BLIDRegExpression = /^[a-zA-Z0-9\ \_\-\:\;\¿\?\!\,\.\Ñ\ñ\u00C0-\u017F]+$/;
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
        function checkDirectionAsist(){
            var direction_assistant = j('#direction_assistant').val();
            var BLIDRegExpression = /^[a-zA-Z0-9\ \_\-\:\;\¿\?\!\,\.\Ñ\ñ\u00C0-\u017F]+$/;
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
        function checkCasting(){
            var casting = j('#casting').val();
            var BLIDRegExpression = /^[a-zA-Z0-9\ \_\-\:\;\¿\?\!\,\.\Ñ\ñ\u00C0-\u017F]+$/;
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
        function checkContinuista(){
            var continuista = j('#continuista').val();
            var BLIDRegExpression = /^[a-zA-Z0-9\ \_\-\:\;\¿\?\!\,\.\Ñ\ñ\u00C0-\u017F]+$/;
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
            checkForm();
        }
        function checkScript(){
            var script = j('#script').val();
            var BLIDRegExpression = /^[a-zA-Z0-9\ \_\-\:\;\¿\?\!\,\.\Ñ\ñ\u00C0-\u017F]+$/;
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
        function checkProduction(){
            var production = j('#production').val();
            var BLIDRegExpression = /^[a-zA-Z0-9\ \_\-\:\;\¿\?\!\,\.\Ñ\ñ\u00C0-\u017F]+$/;
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
            checkForm();
        }
        function checkPhoto(){
            var photografic_direction = j('#photografic_direction').val();
            var BLIDRegExpression = /^[a-zA-Z0-9\ \_\-\:\;\¿\?\!\,\.\Ñ\ñ\u00C0-\u017F]+$/;
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
            checkForm();
        }
        function checkCamara(){
            var camara = j('#camara').val();
            var BLIDRegExpression = /^[a-zA-Z0-9\ \_\-\:\;\¿\?\!\,\.\Ñ\ñ\u00C0-\u017F]+$/;
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
        function checkCamaraAsist(){
            var camara_assistant = j('#camara_assistant').val();
            var BLIDRegExpression = /^[a-zA-Z0-9\ \_\-\:\;\¿\?\!\,\.\Ñ\ñ\u00C0-\u017F]+$/;
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
            checkForm();
        }
        function checkMounting(){
            var mounting = j('#mounting').val();
            var BLIDRegExpression = /^[a-zA-Z0-9\ \_\-\:\;\¿\?\!\,\.\Ñ\ñ\u00C0-\u017F]+$/;
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
        function checkImagePostproduction(){
            var image_postproduction = j('#image_postproduction').val();
            var BLIDRegExpression = /^[a-zA-Z0-9\ \-\_\:\;\¿\?\!\,\.\Ñ\ñ\u00C0-\u017F]+$/;
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
            checkForm();
        }
        function checkSoundPostproduction(){
            var sound_postproduction = j('#sound_postproduction').val();
            var BLIDRegExpression = /^[a-zA-Z0-9\ \-\_\:\;\¿\?\!\,\.\Ñ\ñ\u00C0-\u017F]+$/;
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
            checkForm();
        }
        function checkCatering(){
            var catering = j('#catering').val();
            var BLIDRegExpression = /^[a-zA-Z0-9\ \-\_\:\;\¿\?\!\,\.\Ñ\ñ\u00C0-\u017F]+$/;
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
        function checkMusic(){
            var music = j('#music').val();
            var BLIDRegExpression = /^[a-zA-Z0-9\ \-\_\:\;\¿\?\!\,\.\Ñ\ñ\u00C0-\u017F]+$/;
            if (music.length == 0){
                document.getElementById("musicValidation").style.display = "none";
                validMusic = 1;
            }else {
                if (!BLIDRegExpression.test(music)) {
                    document.getElementById("musicValidation").style.display = "inline";
                    document.getElementById("musicValidation").innerHTML = 'El Campo Contiene Caracteres Invalidos';
                    validMusic = 0;
                }else{
                    document.getElementById("musicValidation").style.display = "none";
                    validMusic = 1;
                }
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
                validDescription == 0 || 
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
                validActors == 0 ||
                validTrailerFile == 0 ||
                validVideoFile == 0 ||
                validImageFile == 0 ||
                validCategory == 0 ||
                validGenre == 0){
                j(".sendButton").attr('class', 'btn btn-primary disabled sendButton orangeButton');
                if(cant_other == null){
                    cant_other = 0;
                }
                var notComplete = "";
                if(validName == 0){
                    notComplete+="<br> Nombre";
                }
                if(validDescription == 0){
                    notComplete+="<br> Descripción";
                }
                if(validCreationDate == 0){
                    notComplete+="<br> Fecha de Creación";
                }
                if(validDirection == 0){
                    notComplete+="<br> Dirección";
                }
                if(validDirectionAsist == 0){
                    notComplete+="<br> Asistente de Dirección";
                }
                if(validCasting == 0){
                    notComplete+="<br> Casting";
                }
                if(validContinuista == 0){
                    notComplete+="<br> Continuista";
                }
                if(validScript == 0){
                    notComplete+="<br> Guión";
                }
                if(validProduction == 0){
                    notComplete+="<br> Producción";
                }
                if(validProductionAssistant == 0){
                    notComplete+="<br> Asistente de Producción";
                }
                if(validPhotograficDirection == 0){
                    notComplete+="<br> Dirección Fotográfica";
                }
                if(validCamara == 0){
                    notComplete+="<br> Cámara";
                }
                if(validCamaraAsist == 0){
                    notComplete+="<br> Asistente de Cámara";
                }
                if(validArt == 0){
                    notComplete+="<br> Dirección de Arte";
                }
                if(validSonorousRegister == 0){
                    notComplete+="<br> Registro Sonoro";
                }
                if(validMounting == 0){
                    notComplete+="<br> Montaje";
                }
                if(validImagePostproduction == 0){
                    notComplete+="<br> Post-produccion de Imagen";
                }
                if(validSoundPostproduction == 0){
                    notComplete+="<br> Post-produccion de Sonido";
                }
                if(validCatering == 0){
                    notComplete+="<br> Catering";
                }
                if(validMusic == 0){
                    notComplete+="<br> Música";
                }
                if(validActors == 0){
                    notComplete+="<br> Actores";
                }
                if(validImageFile == 0){
                    notComplete+="<br> Imagen Referencial";
                }
                if(validVideoFile == 0){
                    notComplete+="<br> Video";
                }
                if(validTrailerFile == 0){
                    notComplete+="<br> Trailer";
                }

                if(validCategory == 0){
                    notComplete+="<br> Categoria";
                }
                if(validGenre == 0){
                    notComplete+="<br> Género";
                }
                
                document.getElementById("sendValidation").style.display = "inline";
                document.getElementById("sendValidation").innerHTML = "Se deben completar todos los campos marcados como obligatorios para enviar el formulario Pendientes: <br> "+ notComplete;
               /* document.getElementById("sendValidation").innerHTML = "Se deben completar todos los campos marcados como obligatorios para enviar el formulario Pendientes: <br> "+" validName "+validName+" validDescription "+ validDescription+" validCreationDate "+validCreationDate+" validDirection "+validDirection+" validDirectionAsist "+validDirectionAsist+" validCasting "+validCasting+" validContinuista "+validContinuista+" validScript "+validScript+" validProduction "+validProduction+" validProductionAssistant "+validProductionAssistant+" validPhotograficDirection "+validPhotograficDirection+" validCamara "+validCamara+" validCamaraAsist "+validCamaraAsist+" validArt "+validArt+" validSonorousRegister "+validSonorousRegister+" validMounting "+validMounting+" validImagePostproduction "+validImagePostproduction+" validSoundPostproduction "+validSoundPostproduction+" validCatering "+validCatering+" validMusic "+validMusic+" validActors "+validActors+" validImageFile "+validImageFile+" validVideoFile "+validVideoFile+" validTrailerFile "+validTrailerFile+" validCategory "+validCategory+" validGenre "+validGenre;*/
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
                validActors == 1 &&
                validTrailerFile == 1 &&
                validVideoFile == 1 &&
                validImageFile == 1 &&
                validCategory == 1 &&
                validGenre == 1){
                j(".sendButton").attr('class', 'btn btn-primary active sendButton orangeButton');
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

                        var videoname =  document.getElementById('url').value;
                        var hasAccentChars = /[À-ÿ\-\:\;\ñ\¿\?\!\¡\,\)\(\=\&\%\$]/;
                        var hasAccentChars2 = /^[A-z0-9 \_\.\u00E0-\u00FC]+$/i;
                        //var str = "el_nino123.mp4";
                        //alert("segundo valid "+videoname+": "+hasAccentChars2.test(videoname));
                        var accentinName = hasAccentChars.test(videoname);
                        var accentinName2 = hasAccentChars2.test(videoname);

                        if (accentinName == true || accentinName2 == false){
                            alert("El nombre del archivo no permite tildes, solo puede contener caracteres alfanuméricos y guiones bajos (_). Por favor, renombre el archivo a un formato valido");
                        }else{
                           uploaderVideo.start(); 
                        }
                        
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
                    //alert("valor: " + document.getElementById('url').value);
                });
               }else{
                alert("No se puede agregar mas videos");
            }
        },

        UploadProgress: function(up, file) {
           document.getElementById(file.id).getElementsByTagName('b')[0].innerHTML = '<span>' + file.percent + "%</span>";
           if(file.percent == 100){
            uploadVideo = true;
            validVideoFile = 1;
            checkForm();
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
        // Subir Trailer
        var uploadTrailer = false;
        var uploaderTrailer = new plupload.Uploader({
         runtimes : 'html5',
            browse_button: 'picktrailer', // this can be an id of a DOM element or the DOM element itself
            url: '/uploadTrailer.php',
            chunk_size: '200kb',
            max_retries: 3,
            filters : {
                max_file_size : '1000mb',
                mime_types: [
                {title : "Video files", extensions : "mp4,webm,avi,ogv,mkv"}
                ]
            },

            init: {
                PostInit: function() {
                   document.getElementById('filelistTrailer').innerHTML = '';

                   document.getElementById('uploadtrailer').onclick = function() {

                        var videoname =  document.getElementById('trailer').value;
                        var hasAccentChars = /[À-ÿ\-\:\;\ñ\¿\?\!\¡\,\)\(\=\&\%\$]/;
                        var hasAccentChars2 = /^[A-z0-9 \_\.\u00E0-\u00FC]+$/i;
                        //var str = "el_nino123.mp4";
                        //alert("segundo valid "+videoname+": "+hasAccentChars2.test(videoname));
                        var accentinName = hasAccentChars.test(videoname);
                        var accentinName2 = hasAccentChars2.test(videoname);

                        if (accentinName == true || accentinName2 == false){
                            alert("El nombre del archivo no permite tildes, solo puede contener caracteres alfanuméricos y guiones bajos (_). Por favor, renombre el archivo a un formato valido");
                        }else{
                           uploaderTrailer.start(); 
                        }
                        
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
                    //alert("valor: " + document.getElementById('trailer').value);
                });
               }else{
                alert("No se puede agregar mas trailers");
            }
        },

        UploadProgress: function(up, file) {
           document.getElementById(file.id).getElementsByTagName('b')[0].innerHTML = '<span>' + file.percent + "%</span>";
           if(file.percent == 100){
            uploadTrailer = true;
            validTrailerFile = 1;
            checkForm();
        }
    },

    Error: function(up, err) {
        alert("Error: " + err.code + ": " + err.message);
        validTrailerFile = 0;
                    //document.getElementById('console').appendChild(document.createTextNode("\nError #" + err.code + ": " + err.message));
                }
            }
        });

        uploaderTrailer.init();
    </script>

@stop