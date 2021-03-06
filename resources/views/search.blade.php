@extends('layouts.mainApp')

@section('content')

<div class="col-sm-12" id="mainBody" align="center" style="overflow: hidden; 
    background-color: #ffffff;
    border-color: #e7e7e7;">

    @if (count($movies) === 0)
    <h5 class="orangeText" style="margin-top: 30px;">No se encuentran videos que cumplan con el criterio de Busqueda</h5>
    @elseif (count($movies) >= 1)
        <div class="col-xs-12 col-sm-12 col-md-12 boldFont orangeText" style="padding-left: 25px;" align="left">
            <H3>Resultados</H3>
        </div>
        @foreach($movies as $key=>$movie)
            @if($key <= 5)
            <div id="movieContent{{$movie->id}}" class="col-xs-12 col-sm-4 col-md-3" style="padding-left: 0px;">
                <div style="padding: 5px; margin: 5px; width: 220px;">
                    <div class="col-md-12">
                        <a href="{{ action("MovieController@show", array($movie->id)) }}">
                            <img src="files/{{$movie->imageRef}}" 
                            title="{{$movie->name}}" 
                            style="width: 180px;
                            height: 110px;"/>
                        </a>
                    </div>
                    <div class="row col-xs-12" style="margin-top: 5px; height: 40px;">
                        <div class="col-xs-9" align="left" style="padding-right: 0px;">
                            <a class="blackAndBoldText" href="{{ action("MovieController@show", array($movie->id)) }}">
                                <p href="{{ action("MovieController@show", array($movie->id)) }}" style="font-size: 14px; margin-top: 0px; margin-bottom: 0px; max-width: 120px">{{$movie->name}}
                            </a>
                        </div>
                        <div class="col-xs-2 col-xs-offset-1" align="right" style="padding-right: 0px; padding-left: 5px;">
                            <a class="blackText" href="{{ action("MovieController@show", array($movie->id)) }}">
                                <p href="{{ action("MovieController@show", array($movie->id)) }}" style="font-size: 14px; margin-top: 0px; margin-bottom: 0px;">{{$movie->production_year}}</p>
                            </a>
                        </div>
                    </div>
                    <div class="row col-xs-12" style="margin-top: 5px; padding-right: 0px">
                        <div class="col-xs-7" align="left" style="padding-right: 0px;">
                            <a class="blackText" href="{{ action("MovieController@show", array($movie->id)) }}">
                                @foreach($genres as $genre)
                                    @if($movie->genre_id == $genre->id)
                                        <p href="{{ action("MovieController@show", array($movie->id)) }}" style="font-size: 14px; margin-top: 0px; margin-bottom: 0px; max-width: 120px">{{$genre->name}}
                                    @endif
                                @endforeach
                            </a>
                        </div>
                        <div class="col-xs-4 col-xs-offset-1" align="right" style="padding-right: 0px; padding-left: 5px;">
                            <a class="blackText" href="{{ action("MovieController@show", array($movie->id)) }}">
                                <p href="{{ action("MovieController@show", array($movie->id)) }}" style="font-size: 14px; margin-top: 0px; margin-bottom: 0px;">{{$movie->duration}}</p>
                            </a>
                        </div>
                    </div>
                    <div class="col-xs-12" style="width: 100%; padding-left: 0px; padding-right: 0px;">
                        <div class="col-xs-6" align="left" style="padding-left: 0px; padding-right: 0px;">
                            <div class="col-xs-12" onclick="openInfo('new','{{$key}}', '{{$movie->id}}', '{{$movie->name}}', '{{$movie->duration}}', '{{$movie->language}}', '{{$movie->type_id}}', '{{$movie->genre_id}}', '{{$movie->production_year}}', '{{$movie->description}}' );">
                                <a class="button orangeAndBoldText" id="info" >Mas Info.</a>
                            </div>
                        </div>
                        <div class="col-xs-6" align="right" style="padding-left: 0px; padding-right: 10px;">
                            @if(is_null($movie->rating))
                                <img src="img/rating/3_0s.jpg" title="{{$movie->name}}" style="display: inline-block; width: 90px;"/>
                            @elseif ($movie->rating <= 0.4)
                                <a href="{{ action("MovieController@show", array($movie->id)) }}"><img src="img/rating/0_0s.jpg" title="{{$movie->name}}" style="display: inline-block; width: 90px;"/></a>
                            @elseif ($movie->rating < 1.0 && $movie->rating >= 0.5)
                                <a href="{{ action("MovieController@show", array($movie->id)) }}"><img src="img/rating/0_5s.jpg" title="{{$movie->name}}" style="display: inline-block; width: 90px;"/></a>
                            @elseif ($movie->rating < 1.5 && $movie->rating >= 1.0)
                                <a href="{{ action("MovieController@show", array($movie->id)) }}"><img src="img/rating/1_0s.jpg" title="{{$movie->name}}" style="display: inline-block; width: 90px;"/></a>
                            @elseif ($movie->rating < 2.0 && $movie->rating >= 1.5)
                                <a href="{{ action("MovieController@show", array($movie->id)) }}"><img src="img/rating/1_5s.jpg" title="{{$movie->name}}" style="display: inline-block; width: 90px;"/></a>
                            @elseif ($movie->rating < 2.5 && $movie->rating >= 2.0)
                                <a href="{{ action("MovieController@show", array($movie->id)) }}"><img src="img/rating/2_0s.jpg" title="{{$movie->name}}" style="display: inline-block; width: 90px;"/></a>
                            @elseif ($movie->rating < 3.0 && $movie->rating >= 2.5)
                                <a href="{{ action("MovieController@show", array($movie->id)) }}"><img src="img/rating/2_5s.jpg" title="{{$movie->name}}" style="display: inline-block; width: 90px;"/></a>
                            @elseif ($movie->rating < 3.5 && $movie->rating >= 3.0)
                                <a href="{{ action("MovieController@show", array($movie->id)) }}"><img src="img/rating/3_0s.jpg" title="{{$movie->name}}" style="display: inline-block; width: 90px;"/></a>
                            @elseif ($movie->rating < 4.0 && $movie->rating >= 3.5)
                                <a href="{{ action("MovieController@show", array($movie->id)) }}"><img src="img/rating/3_5s.jpg" title="{{$movie->name}}" style="display: inline-block; width: 90px;"/></a>
                            @elseif ($movie->rating < 4.5 && $movie->rating >= 4.0)
                                <a href="{{ action("MovieController@show", array($movie->id)) }}"><img src="img/rating/4_0s.jpg" title="{{$movie->name}}" style="display: inline-block; width: 90px;"/></a>
                            @elseif ($movie->rating < 5.0 && $movie->rating >= 4.5)
                                <a href="{{ action("MovieController@show", array($movie->id)) }}"><img src="img/rating/4_5s.jpg" title="{{$movie->name}}" style="display: inline-block; width: 90px;"/></a>
                            @elseif ($movie->rating >= 5.0)
                                <a href="{{ action("MovieController@show", array($movie->id)) }}"><img src="img/rating/5_0s.jpg" title="{{$movie->name}}" style="display: inline-block; width: 90px;"/></a>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            <ul class="col-xs-10 col-xs-offset-1 col-sm-10 orangeBorder" id="newShowInfo{{$key}}" style="display: none; margin-top: 10px;">
                <div id="newSlideContainer" class="slideContainer" style="margin-top: 10px;">
                    <div class="col-xs-12">
                        <strong class="slideTitle orangeAndBoldText" style="font-size: 16px;" id="newSlideTitle{{$key}}"></strong>
                        <div class="slideBody" style="text-align: left;">
                            <ul>
                                <li>
                                    <div class="messageblock">
                                        <div class="message">Duración: 
                                            <strong id="newDuration{{$key}}"></strong>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="message">Idioma: 
                                        <strong id="newLanguage{{$key}}"></strong>
                                    </div>
                                </li>
                                <li>
                                    <div class="message">Categorias: 
                                        <strong id="newCategories{{$key}}"></strong>
                                    </div>
                                </li>
                                <li>
                                    <div class="message">Año de Producción: 
                                        <strong id="newYear{{$key}}"></strong>
                                    </div>
                                </li>
                                <li>
                                    <div class="messageinfo" id="newDescription{{$key}}">
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-xs-12">
                        <a class="orangeAndBoldText" style="font-size: 16px; margin-bottom: 10px;" id="newWatchNow{{$key}}">
                            <div id="newNotificationFooter">Ver Ahora</div>
                        </a>
                    </div>
                </div>
            </ul>
            @else
                <div id="movieContent{{$movie->id}}" class="col-md-3 hidden-sm hidden-xs" style="padding-left: 0px;">
                    <div style="padding: 5px; margin: 5px; width: 220px;">
                        <div class="col-md-12">
                            <a href="{{ action("MovieController@show", array($movie->id)) }}">
                                <img src="files/{{$movie->imageRef}}" 
                                title="{{$movie->name}}" 
                                style="width: 180px;
                                height: 110px;"/>
                            </a>
                        </div>
                        <div class="row col-xs-12" style="margin-top: 5px; height: 40px;">
                            <div class="col-xs-9" align="left" style="padding-right: 0px;">
                                <a class="blackAndBoldText" href="{{ action("MovieController@show", array($movie->id)) }}">
                                    <p href="{{ action("MovieController@show", array($movie->id)) }}" style="font-size: 14px; margin-top: 0px; margin-bottom: 0px; max-width: 120px">{{$movie->name}}
                                </a>
                            </div>
                            <div class="col-xs-2 col-xs-offset-1" align="right" style="padding-right: 0px; padding-left: 5px;">
                                <a class="blackText" href="{{ action("MovieController@show", array($movie->id)) }}">
                                    <p href="{{ action("MovieController@show", array($movie->id)) }}" style="font-size: 14px; margin-top: 0px; margin-bottom: 0px;">{{$movie->production_year}}</p>
                                </a>
                            </div>
                        </div>
                        <div class="row col-xs-12" style="margin-top: 5px; padding-right: 0px">
                            <div class="col-xs-7" align="left" style="padding-right: 0px;">
                                <a class="blackText" href="{{ action("MovieController@show", array($movie->id)) }}">
                                    @foreach($genres as $genre)
                                        @if($movie->genre_id == $genre->id)
                                            <p href="{{ action("MovieController@show", array($movie->id)) }}" style="font-size: 14px; margin-top: 0px; margin-bottom: 0px; max-width: 120px">{{$genre->name}}
                                        @endif
                                    @endforeach
                                </a>
                            </div>
                            <div class="col-xs-4 col-xs-offset-1" align="right" style="padding-right: 0px; padding-left: 5px;">
                                <a class="blackText" href="{{ action("MovieController@show", array($movie->id)) }}">
                                    <p href="{{ action("MovieController@show", array($movie->id)) }}" style="font-size: 14px; margin-top: 0px; margin-bottom: 0px;">{{$movie->duration}}</p>
                                </a>
                            </div>
                        </div>
                        <div class="col-xs-12" style="width: 100%; padding-left: 0px; padding-right: 0px;">
                            <div class="col-xs-6" align="left" style="padding-left: 0px; padding-right: 0px;">
                                <div class="col-xs-12" onclick="openInfo('new','{{$key}}', '{{$movie->id}}', '{{$movie->name}}', '{{$movie->duration}}', '{{$movie->language}}', '{{$movie->type_id}}', '{{$movie->genre_id}}', '{{$movie->production_year}}', '{{$movie->description}}' );">
                                    <a class="button orangeAndBoldText" id="info" >Mas Info.</a>
                                </div>
                            </div>
                            <div class="col-xs-6" align="right" style="padding-left: 0px; padding-right: 10px;">
                                @if(is_null($movie->rating))
                                    <img src="img/rating/3_0s.jpg" title="{{$movie->name}}" style="display: inline-block; width: 90px;"/>
                                @elseif ($movie->rating <= 0.4)
                                    <a href="{{ action("MovieController@show", array($movie->id)) }}"><img src="img/rating/0_0s.jpg" title="{{$movie->name}}" style="display: inline-block; width: 90px;"/></a>
                                @elseif ($movie->rating < 1.0 && $movie->rating >= 0.5)
                                    <a href="{{ action("MovieController@show", array($movie->id)) }}"><img src="img/rating/0_5s.jpg" title="{{$movie->name}}" style="display: inline-block; width: 90px;"/></a>
                                @elseif ($movie->rating < 1.5 && $movie->rating >= 1.0)
                                    <a href="{{ action("MovieController@show", array($movie->id)) }}"><img src="img/rating/1_0s.jpg" title="{{$movie->name}}" style="display: inline-block; width: 90px;"/></a>
                                @elseif ($movie->rating < 2.0 && $movie->rating >= 1.5)
                                    <a href="{{ action("MovieController@show", array($movie->id)) }}"><img src="img/rating/1_5s.jpg" title="{{$movie->name}}" style="display: inline-block; width: 90px;"/></a>
                                @elseif ($movie->rating < 2.5 && $movie->rating >= 2.0)
                                    <a href="{{ action("MovieController@show", array($movie->id)) }}"><img src="img/rating/2_0s.jpg" title="{{$movie->name}}" style="display: inline-block; width: 90px;"/></a>
                                @elseif ($movie->rating < 3.0 && $movie->rating >= 2.5)
                                    <a href="{{ action("MovieController@show", array($movie->id)) }}"><img src="img/rating/2_5s.jpg" title="{{$movie->name}}" style="display: inline-block; width: 90px;"/></a>
                                @elseif ($movie->rating < 3.5 && $movie->rating >= 3.0)
                                    <a href="{{ action("MovieController@show", array($movie->id)) }}"><img src="img/rating/3_0s.jpg" title="{{$movie->name}}" style="display: inline-block; width: 90px;"/></a>
                                @elseif ($movie->rating < 4.0 && $movie->rating >= 3.5)
                                    <a href="{{ action("MovieController@show", array($movie->id)) }}"><img src="img/rating/3_5s.jpg" title="{{$movie->name}}" style="display: inline-block; width: 90px;"/></a>
                                @elseif ($movie->rating < 4.5 && $movie->rating >= 4.0)
                                    <a href="{{ action("MovieController@show", array($movie->id)) }}"><img src="img/rating/4_0s.jpg" title="{{$movie->name}}" style="display: inline-block; width: 90px;"/></a>
                                @elseif ($movie->rating < 5.0 && $movie->rating >= 4.5)
                                    <a href="{{ action("MovieController@show", array($movie->id)) }}"><img src="img/rating/4_5s.jpg" title="{{$movie->name}}" style="display: inline-block; width: 90px;"/></a>
                                @elseif ($movie->rating >= 5.0)
                                    <a href="{{ action("MovieController@show", array($movie->id)) }}"><img src="img/rating/5_0s.jpg" title="{{$movie->name}}" style="display: inline-block; width: 90px;"/></a>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                <ul class="col-xs-10 col-xs-offset-1 col-sm-10 orangeBorder" id="newShowInfo{{$key}}" style="display: none; margin-top: 10px;">
                    <div id="newSlideContainer" class="slideContainer" style="margin-top: 10px;">
                        <div class="col-xs-12">
                            <strong class="slideTitle orangeAndBoldText" style="font-size: 16px;" id="newSlideTitle{{$key}}"></strong>
                            <div class="slideBody" style="text-align: left;">
                                <ul>
                                    <li>
                                        <div class="messageblock">
                                            <div class="message">Duración: 
                                                <strong id="newDuration{{$key}}"></strong>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="message">Idioma: 
                                            <strong id="newLanguage{{$key}}"></strong>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="message">Categorias: 
                                            <strong id="newCategories{{$key}}"></strong>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="message">Año de Producción: 
                                            <strong id="newYear{{$key}}"></strong>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="messageinfo" id="newDescription{{$key}}">
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-xs-12">
                            <a class="orangeAndBoldText" style="font-size: 16px; margin-bottom: 10px;" id="newWatchNow{{$key}}">
                                <div id="newNotificationFooter">Ver Ahora</div>
                            </a>
                        </div>
                    </div>
                </ul>
            @endif
        @endforeach
    @endif
</div>
@endsection


@section('page-style-files')
@stop

@section('page-js-files')
@stop

@section('page-js-script')

<script type="text/javascript">
    function openInfo(type, key, id, name, duration, language, category, category2, production_year, description) {
        var width = window.innerWidth || document.documentElement.clientWidth || document.body.clientWidth;
        var height = window.innerHeight || document.documentElement.clientHeight || document.body.clientHeight;

        var generosName = [];
        var generosIds = [];
        var tiposName = [];
        var tiposIds = [];
        @foreach($genres as $key=>$genre)
            //alert("{!!$genre->name!!}");
            generosIds[{{$key}}] = "{!!$genre->id!!}";
            generosName[{{$key}}] = "{!!$genre->name!!}";
        @endforeach

          @foreach($types as $key=>$videoType)
            //alert("{!!$videoType->name!!}");
            tiposIds[{{$key}}] = "{!!$videoType->id!!}";
            tiposName[{{$key}}] = "{!!$videoType->name!!}";
        @endforeach

        //alert("largo tipo id: "+tiposIds.length);

        //alert("Generos "+ generos);

        if(width >= 992){
            //Resolución MD
            if(key <= 3){
                var slideToUse = 3;
            }else{
                var slideToUse = 7;
            }
            var changeSlide = 0;
            while(changeSlide <= 3 && slideToUse >= key){
                var actual = document.getElementById(type+"ShowInfo"+slideToUse);
                if(actual == null){
                    slideToUse--;
                    changeSlide++;
                }else{
                    actual = document.getElementById(type+"ShowInfo"+slideToUse);
                    if (actual.style.display === 'none') {
                        var slideTitleText = document.getElementById(type+"SlideTitle"+slideToUse);
                        var durationText = document.getElementById(type+"Duration"+slideToUse);
                        var languajeText = document.getElementById(type+"Language"+slideToUse);
                        var categoriesText = document.getElementById(type+"Categories"+slideToUse);
                        var yearText = document.getElementById(type+"Year"+slideToUse);
                        var descriptionText = document.getElementById(type+"Description"+slideToUse);
                        slideTitleText.innerHTML = name;
                        durationText.innerHTML = duration;
                        languajeText.innerHTML = language;

                        var tipo = category;
                        var genero = category2;
                        for(var i = 0; i < tiposIds.length; i++){
                            if(category == tiposIds[i]){
                                tipo = tiposName[i];
                            }
                        }
                        for(var j = 0; j < generosIds.length; j++){
                            if(category2 == generosIds[j]){
                                genero = generosName[j];
                            }
                        }

                        categoriesText.innerHTML = tipo + ", " + genero;
                        yearText.innerHTML = production_year;
                        descriptionText.innerHTML = description;

                        document.getElementById(type+"WatchNow"+slideToUse).href="/upload/"+id;
                        closePopups();
                        actual.style.display = 'block';

                    }else{
                        closePopups();
                    }
                    changeSlide = 4;
                }
            }
        }else if (width < 992 && width >= 768){
            //Resolución SM
            if(key <= 2){
                var slideToUse = 2;
            }else{
                var slideToUse = 5;
            }
            var changeSlide = 0;
            while(changeSlide <= 2 && slideToUse >= key){
                var actual = document.getElementById(type+"ShowInfo"+slideToUse);
                if(actual == null){
                    slideToUse--;
                    changeSlide++;
                }else{
                    actual = document.getElementById(type+"ShowInfo"+slideToUse);
                    if (actual.style.display === 'none') {
                        var slideTitleText = document.getElementById(type+"SlideTitle"+slideToUse);
                        var durationText = document.getElementById(type+"Duration"+slideToUse);
                        var languajeText = document.getElementById(type+"Language"+slideToUse);
                        var categoriesText = document.getElementById(type+"Categories"+slideToUse);
                        var yearText = document.getElementById(type+"Year"+slideToUse);
                        var descriptionText = document.getElementById(type+"Description"+slideToUse);
                        slideTitleText.innerHTML = name;
                        durationText.innerHTML = duration;
                        languajeText.innerHTML = language;
                        
                        var tipo = category;
                        var genero = category2;
                        for(var i = 0; i < tiposIds.length; i++){
                            if(category == tiposIds[i]){
                                tipo = tiposName[i];
                            }
                        }
                        for(var j = 0; j < generosIds.length; j++){
                            if(category2 == generosIds[j]){
                                genero = generosName[j];
                            }
                        }
                        categoriesText.innerHTML = tipo + ", " + genero;
                        yearText.innerHTML = production_year;
                        descriptionText.innerHTML = description;

                        document.getElementById(type+"WatchNow"+slideToUse).href="/upload/"+id;
                        closePopups();
                        actual.style.display = 'block';

                    }else{
                        closePopups();
                    }
                    changeSlide = 3;
                }
            }
        }else if (width < 768){
            //Resolución XS
            var actual = document.getElementById(type+"ShowInfo"+key);
            if (actual.style.display === 'none') {
                var slideTitleText = document.getElementById(type+"SlideTitle"+key);
                var durationText = document.getElementById(type+"Duration"+key);
                var languajeText = document.getElementById(type+"Language"+key);
                var categoriesText = document.getElementById(type+"Categories"+key);
                var yearText = document.getElementById(type+"Year"+key);
                var descriptionText = document.getElementById(type+"Description"+key);
                slideTitleText.innerHTML = name;
                durationText.innerHTML = duration;
                languajeText.innerHTML = language;
                var tipo = category;
                var genero = category2;
                for(var i = 0; i < tiposIds.length; i++){
                    if(category == tiposIds[i]){
                        tipo = tiposName[i];
                    }
                }
                for(var j = 0; j < generosIds.length; j++){
                    if(category2 == generosIds[j]){
                        genero = generosName[j];
                    }
                }
                categoriesText.innerHTML = tipo + ", " + genero;
                
                yearText.innerHTML = production_year;
                descriptionText.innerHTML = description;

                document.getElementById(type+"WatchNow"+key).href="/upload/"+id;
                closePopups();
                actual.style.display = 'block';
            }else{
                closePopups();
            }
        }
    }
    
    function closePopups(){
        for(x = 0; x<=7; x++){
            var newShow = document.getElementById("newShowInfo"+x);
            if(newShow != null){
                if (newShow.style.display === 'block') {
                    newShow.style.display = 'none';
                }
            }
        }
    }
</script>
@stop