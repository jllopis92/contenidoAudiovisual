@extends('layouts.mainApp')

@section('content')

<div class="col-sm-10 col-sm-offset-1" id="mainBody" align="center" style="overflow: hidden; 
    background-color: #f8f8f8;
    border-color: #e7e7e7;">

    @if (count($movies) === 0)
    <h5 style="margin-top: 30px;">No se encuentran videos que cumplan con el criterio de Busqueda</h5>
    @elseif (count($movies) >= 1)
        <div class="col-xs-12 col-sm-12 col-md-12">
            <H3>Resultados</H3>
        </div>
        @foreach($movies as $key=>$movie)
                <div id="movieContent{{$movie->id}}" class="col-xs-12 col-sm-6 col-md-4">
                    <div style="padding: 5px; margin: 5px; width: 220px;">
                        <div class="col-md-12">
                            <a href="{{ action("MovieController@show", array($movie->id)) }}">
                                <img src="files/{{$movie->imageRef}}" 
                                title="{{$movie->name}}" 
                                style="width: 180px;
                                height: 110px;"/>
                            </a>
                        </div>
                        <div class="col-md-12" align="middle" style="margin-top: 5px;">
                            <a href="{{ action("MovieController@show", array($movie->id)) }}"><h3 href="{{ action("MovieController@show", array($movie->id)) }}" style="color:#337ab7; font-size: 14px; margin-top: 0px; margin-bottom: 0px;">{{$movie->name}}</h3>
                            </a>
                        </div>
                        <div class="col-md-12" align="middle" style="width: 100%">
                            @if(is_null($movie->rating))
                            <img src="img/rating/3_0s.jpg" title="{{$movie->name}}" style="display: inline-block;"/>
                            @elseif ($movie->rating <= 0.4)
                            <a href="{{ action("MovieController@show", array($movie->id)) }}"><img src="img/rating/0_0s.jpg" title="{{$movie->name}}" style="display: inline-block;"/></a>
                            @elseif ($movie->rating < 1.0 && $movie->rating >= 0.5)
                            <a href="{{ action("MovieController@show", array($movie->id)) }}"><img src="img/rating/0_5s.jpg" title="{{$movie->name}}" style="display: inline-block;"/></a>
                            @elseif ($movie->rating < 1.5 && $movie->rating >= 1.0)
                            <a href="{{ action("MovieController@show", array($movie->id)) }}"><img src="img/rating/1_0s.jpg" title="{{$movie->name}}" style="display: inline-block;"/></a>
                            @elseif ($movie->rating < 2.0 && $movie->rating >= 1.5)
                            <a href="{{ action("MovieController@show", array($movie->id)) }}"><img src="img/rating/1_5s.jpg" title="{{$movie->name}}" style="display: inline-block;"/></a>
                            @elseif ($movie->rating < 2.5 && $movie->rating >= 2.0)
                            <a href="{{ action("MovieController@show", array($movie->id)) }}"><img src="img/rating/2_0s.jpg" title="{{$movie->name}}" style="display: inline-block;"/></a>
                            @elseif ($movie->rating < 3.0 && $movie->rating >= 2.5)
                            <a href="{{ action("MovieController@show", array($movie->id)) }}"><img src="img/rating/2_5s.jpg" title="{{$movie->name}}" style="display: inline-block;"/></a>
                            @elseif ($movie->rating < 3.5 && $movie->rating >= 3.0)
                            <a href="{{ action("MovieController@show", array($movie->id)) }}"><img src="img/rating/3_0s.jpg" title="{{$movie->name}}" style="display: inline-block;"/></a>
                            @elseif ($movie->rating < 4.0 && $movie->rating >= 3.5)
                            <a href="{{ action("MovieController@show", array($movie->id)) }}"><img src="img/rating/3_5s.jpg" title="{{$movie->name}}" style="display: inline-block;"/></a>
                            @elseif ($movie->rating < 4.5 && $movie->rating >= 4.0)
                            <a href="{{ action("MovieController@show", array($movie->id)) }}"><img src="img/rating/4_0s.jpg" title="{{$movie->name}}" style="display: inline-block;"/></a>
                            @elseif ($movie->rating < 5.0 && $movie->rating >= 4.5)
                            <a href="{{ action("MovieController@show", array($movie->id)) }}"><img src="img/rating/4_5s.jpg" title="{{$movie->name}}" style="display: inline-block;"/></a>
                            @elseif ($movie->rating >= 5.0)
                            <a href="{{ action("MovieController@show", array($movie->id)) }}"><img src="img/rating/5_0s.jpg" title="{{$movie->name}}" style="display: inline-block;"/></a>
                            @endif
                        </div>
                        <div class="col-md-12" align="middle" onclick="openInfo('new','{{$key}}', '{{$movie->id}}', '{{$movie->name}}', '{{$movie->duration}}', '{{$movie->language}}', '{{$movie->category}}', '{{$movie->category2}}', '{{$movie->production_year}}', '{{$movie->description}}' );">
                            <a class="button" id="info" >Mas Información</a>
                        </div>
                    </div>
                </div>
                <ul class="col-xs-10 col-xs-offset-1 col-sm-12 col-md-12" id="newShowInfo{{$key}}" style="display: none; margin-top: 10px;">
                    <div id="newSlideContainer" class="slideContainer">
                        <strong class="slideTitle" id="newSlideTitle{{$key}}"></strong>
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
                        <a id="newWatchNow{{$key}}">
                            <div id="newNotificationFooter">Ver Ahora</div>
                        </a>
                    </div>
                </ul>   
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
        if(width >= 992){
            //Resolución MD
            if(key <= 2){
                var actual = document.getElementById(type+"ShowInfo2");
                if (actual.style.display === 'none') {
                    //alert("llave: "+key)
                    var slideTitleText = document.getElementById(type+"SlideTitle2");
                    var durationText = document.getElementById(type+"Duration2");
                    var languajeText = document.getElementById(type+"Language2");
                    var categoriesText = document.getElementById(type+"Categories2");
                    var yearText = document.getElementById(type+"Year2");
                    var descriptionText = document.getElementById(type+"Description2");
                    slideTitleText.innerHTML = name;
                    durationText.innerHTML = duration;
                    languajeText.innerHTML = language;
                    categoriesText.innerHTML = category + ", " + category2;
                    yearText.innerHTML = production_year;
                    descriptionText.innerHTML = description;

                    document.getElementById(type+"WatchNow2").href="/upload/"+id;
                    closePopups();
                    actual.style.display = 'block';

                }else{
                    closePopups();
                }
            }else{
                var actual = document.getElementById(type+"ShowInfo5");
                if (actual.style.display === 'none') {
                    var slideTitleText = document.getElementById(type+"SlideTitle5");
                    var durationText = document.getElementById(type+"Duration5");
                    var languajeText = document.getElementById(type+"Language5");
                    var categoriesText = document.getElementById(type+"Categories5");
                    var yearText = document.getElementById(type+"Year5");
                    var descriptionText = document.getElementById(type+"Description5");
                    slideTitleText.innerHTML = name;
                    durationText.innerHTML = duration;
                    languajeText.innerHTML = language;
                    categoriesText.innerHTML = category + ", " + category2;
                    yearText.innerHTML = production_year;
                    descriptionText.innerHTML = description;

                    document.getElementById(type+"WatchNow5").href="/upload/"+id;
                    closePopups();
                    actual.style.display = 'block';
                }else{
                    closePopups();
                }
            }

        }else if (width < 992 && width >= 768){
            //Resolución SM
            if(key <= 1){
                var actual = document.getElementById(type+"ShowInfo1");
                if (actual.style.display === 'none') {
                    var slideTitleText = document.getElementById(type+"SlideTitle1");
                    var durationText = document.getElementById(type+"Duration1");
                    var languajeText = document.getElementById(type+"Language1");
                    var categoriesText = document.getElementById(type+"Categories1");
                    var yearText = document.getElementById(type+"Year1");
                    var descriptionText = document.getElementById(type+"Description1");
                    slideTitleText.innerHTML = name;
                    durationText.innerHTML = duration;
                    languajeText.innerHTML = language;
                    categoriesText.innerHTML = category + ", " + category2;
                    yearText.innerHTML = production_year;
                    descriptionText.innerHTML = description;

                    document.getElementById(type+"WatchNow1").href="/upload/"+id;
                    closePopups();
                    actual.style.display = 'block';
                }else{
                    closePopups();
                }
            }else if(key <= 3 && key > 1){
                var actual = document.getElementById(type+"ShowInfo3");
                if (actual.style.display === 'none') {
                    var slideTitleText = document.getElementById(type+"SlideTitle3");
                    var durationText = document.getElementById(type+"Duration3");
                    var languajeText = document.getElementById(type+"Language3");
                    var categoriesText = document.getElementById(type+"Categories3");
                    var yearText = document.getElementById(type+"Year3");
                    var descriptionText = document.getElementById(type+"Description3");
                    slideTitleText.innerHTML = name;
                    durationText.innerHTML = duration;
                    languajeText.innerHTML = language;
                    categoriesText.innerHTML = category + ", " + category2;
                    yearText.innerHTML = production_year;
                    descriptionText.innerHTML = description;

                    document.getElementById(type+"WatchNow3").href="/upload/"+id;
                    closePopups();
                    actual.style.display = 'block';
                }else{
                    closePopups();
                }
            } else{
                var actual = document.getElementById(type+"ShowInfo5");
                if (actual.style.display === 'none') {
                    var slideTitleText = document.getElementById(type+"SlideTitle5");
                    var durationText = document.getElementById(type+"Duration5");
                    var languajeText = document.getElementById(type+"Language5");
                    var categoriesText = document.getElementById(type+"Categories5");
                    var yearText = document.getElementById(type+"Year5");
                    var descriptionText = document.getElementById(type+"Description5");
                    slideTitleText.innerHTML = name;
                    durationText.innerHTML = duration;
                    languajeText.innerHTML = language;
                    categoriesText.innerHTML = category + ", " + category2;
                    yearText.innerHTML = production_year;
                    descriptionText.innerHTML = description;

                    document.getElementById(type+"WatchNow5").href="/upload/"+id;
                    closePopups();
                    actual.style.display = 'block';
                }else{
                    closePopups();
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
                categoriesText.innerHTML = category + ", " + category2;
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
        for(x = 0; x<=5; x++){
            var actual = document.getElementById("newShowInfo"+x);
            if (actual.style.display === 'block') {
                actual.style.display = 'none';
            }
        }
    }
</script>
@stop