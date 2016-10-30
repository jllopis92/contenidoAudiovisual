@extends('layouts.app')

@section('content')

<!-- jQuery library (served from Google) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script type="text/javascript" src="js/jquery.immersive-slider.js"></script>

<style>
    html {
      height: 100%;
    }
    body {
      font-family: 'Roboto', sans-serif !important;
    }
    
    .wrapper {
        height: auto !important;
        height: 100%;
        margin: 0 auto; 
        overflow: hidden;
    }
    
    a {
      text-decoration: none;
    }
    
    
    h1, h2 {
      width: 100%;
      float: left;
    }
    h1 {
      margin-top: 25px;
      color: #000;
      margin-bottom: 5px;
      font-size: 50px;
      letter-spacing: -4px;
    }
    h2 {
      color: #444;
      font-weight: 100;
      margin-top: 0;
      margin-bottom: 10px;
    }
    h3 {
      font-family: 'Roboto', sans-serif !important;
    }
    
    .pointer {
      color: #9b59b6;
      font-size: 30px;
      margin-top: 15px;
    }
    pre {
      margin: 80px auto;
    }
    pre code {
      padding: 35px;
      border-radius: 5px;
      font-size: 15px;
      background: rgba(0,0,0,0.1);
      border: rgba(0,0,0,0.05) 5px solid;
      max-width: 500px;
    }
    .main {
      float: left;
      width: 100%;
      margin: 0 auto;
      background: #161923;
    }
    
    .main h1 {
      padding:20px 50px;
      float: left;
      width: 100%;
      font-size: 90px;
      box-sizing: border-box;
      -webkit-box-sizing: border-box;
      -moz-box-sizing: border-box;
      font-weight: 100;
      color: black;
      margin: 0;
      margin-top: 70px;
      letter-spacing: -1px;
    }
   
    .main h1.demo1 {
      background: #1ABC9C;
    }
    
    .reload.bell {
      font-size: 12px;
      padding: 20px;
      width: 45px;
      text-align: center;
      height: 47px;
      border-radius: 50px;
      -webkit-border-radius: 50px;
      -moz-border-radius: 50px;
    }
    
    .reload.bell #notification {
      font-size: 25px;
      line-height: 140%;
    }
    .reload:hover{
      background: #A2261E;
    }
    .clear {
      width: auto;
    }
    .btn:hover, .btn:hover {
      background: rgba(0,0,0,0.8);
    }
    .btns {
      width: 410px;
      margin: 50px auto;
    }
    .credit {
      text-align: center;
      color: #444;
      padding: 10px;
      margin: 0 0 0 0;
      background: #161923;
      color: #FFF;
      float: left;
      width: 100%;
    }
    .credit a {
      color: #fff;
      text-decoration: none;
      font-weight: bold;
    }
    
    .back {
      position: absolute;
      top: 0;
      left: 0;
      text-align: center;
      display: block;
      padding: 7px;
      width: 100%;
      box-sizing: border-box;
      -moz-box-sizing: border-box;
      -webkit-box-sizing: border-box;
      background: rgba(255, 255, 255, 0.25);
      font-weight: bold;
      font-size: 13px;
      color: #000;
      -webkit-transition: all 200ms ease-out;
      -moz-transition: all 200ms ease-out;
      -o-transition: all 200ms ease-out;
      transition: all 200ms ease-out;
    }
    .back:hover {
      color: black;
      background: rgba(255, 255, 255, 0.5);
    }
    
    
    .page_container {
      max-width: 100%;
      margin: 50px auto;
    }
    .header {
      background: white;
      padding-top: 10px;
      margin-bottom: 0;
    }
    .header h1{
      margin-bottom: 0;
      font-size: 45px;
    }
    .header .menu {
      padding-bottom: 10px;
    }
    .benefits {
      color: black;
      height: 100px;
      background: #FFF;
      position: relative;
      width: 100%;
      padding: 25px;
      font-size: 40px;
      font-weight: 100;
      float: left;
      box-sizing: border-box;
      -moz-box-sizing: border-box;
      -webkit-box-sizing: border-box;
    }
    .benefits .page_container{
      margin-bottom: 50px;
      margin-top: 0;
    }
  
    .immersive_slider .is-slide .content h2{
      line-height: 140%;
      font-weight: 100;
      color: white;
      font-weight: 100;
    }
    .immersive_slider .is-slide .content a {
      color: white;
    }
  
  .immersive_slider .is-slide .content p{
    float: left;
    font-weight: 100;
    width: 100%;
    font-size: 17px;
    margin-top: 5px;
  }
  #nav{list-style:none;margin: 0px;
        padding: 0px;}
        #nav li {
            float: left;
            margin-right: 20px;
            font-size: 14px;
            font-weight:bold;
        }
        #nav li a{color:#333333;text-decoration:none}
        #nav li a:hover{color:#006699;text-decoration:none}
        .slide_li{position:relative}
        .slideContainer {
            background-color: #fff;
            border: 1px solid rgba(100, 100, 100, .4);
            -webkit-box-shadow: 0 3px 8px rgba(0, 0, 0, .25);
            overflow: visible;
            position: absolute;
            top: 30px;
            margin-left: -170px;
            width: 400px;
            z-index: 1000;
            display: none;
        }
        .slideContainer:before {
            content: '';
            display: block;
            position: absolute;
            width: 0;
            height: 0;
            color: transparent;
            border: 10px solid black;
            border-color: transparent transparent white;
            margin-top: -20px;
            margin-left: 188px;
        }
        .slideTitle {
            z-index: 1000;
            font-weight: bold;
            padding: 8px;
            font-size: 13px;
            background-color: #ffffff;
            width: 384px;
            border-bottom: 1px solid #dddddd;
        }
        .slideBody {
            padding: 10px 5px 5px 5px !important;
            min-height:150px;
        }
        .slideLink {
          background: #000 none repeat scroll 0 0;
          border: medium none;
          color: #fff;
          cursor: pointer;
          display: block;
          font-family: 'Roboto', sans-serif !important;
          font-size: 0.875em;
          margin: 10px 0 0;
          outline: medium none;
          padding: 10px;
          text-transform: uppercase;
          transition: all 0.5s ease 0s;
        }
    </style>

    <script type="text/javascript" >
      $(document).ready(function(){
        $(".slideLink").click(function(){
          value = $(this).attr('id');
          //$(".slideContainer").hide(); tiene que borrar todos los popups
          $("#slideContainer"+value).fadeToggle(300);
          return false;
        });
        //Document Click
        $(document).click(function(){
          value=$(this).attr('id');
          $(".slideContainer").hide();
        });
        //Popup Click
        $(".slideContainer").click(function(){
          return false
        });
      });
      </script>

<div class="content-grids">

    <div id="immersive_slider">
        @foreach($advertisings as $advertising)
          <div class="slide" data-blurred="files/{{$advertising->image}}">
            <div class="content">
              <h2><a href="{{ action("MovieController@show", array($advertising->movie_id)) }}" target="_blank">{{$advertising->name}}</a></h2>
              <p>{{$advertising->description}}</p>
            </div>
            <div class="image">
              <a href="{{ action("MovieController@show", array($advertising->movie_id)) }}" target="_blank">
                <img src="files/{{$advertising->image}}" alt="Slider 1">
              </a>
            </div>
          </div>
        @endforeach
          
          <a href="#" class="is-prev">&laquo;</a>
          <a href="#" class="is-next">&raquo;</a>
        </div>
        <script type="text/javascript">
      $(document).ready( function() {
        $("#immersive_slider").immersive_slider({
          container: null,
          loop: false, // Toggle to false if you don't want the slider to loop. Default is true.
          /*autoStart: 10000*/ // Define the number of milliseconds before it navigates automatically. Change this to 0 or false to disable autoStart. The default value is 5000.
        });
      });
    </script>

    {{-- <script type="text/javascript">
  function showmovieSlide(){
      document.getElementById("slide2").style.display="inline";
  }
</script> --}}


    <H3 style="margin-top: 0px;">Nuevos</H3>
    @foreach($newMovies as $key=>$movie)

    @if ($key % 4 == 3)
    <div class="content-grid last-grid">
        @else
        <div class="content-grid">
            @endif
            <a href="{{ action("MovieController@show", array($movie->id)) }}"><img src="files/{{$movie->imageRef}}" title="{{$movie->name}}" style="width: 220px; height: 220px;"/></a>
                <a href="{{ action("MovieController@show", array($movie->id)) }}"><h3 href="{{ action("MovieController@show", array($movie->id)) }}" style="margin-top: 0px; margin-bottom: 0px;">{{$movie->name}}</h3></a>

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
                <li id="notification_li" class="notification_li">
                  <a data-id="{{$key}}" id="{{$key}}" class="slideLink" >Mas Información</a>
                  <div id="slideContainer{{$key}}" class="slideContainer">
                    <div class="slideTitle">{{$movie->name}}</div>
                    <div class="slideBody" style="text-align: left;">
                      <ul>
                        <li>
                            <div class="messageblock">
                              <div class="message"><strong>Duración: </strong> {{$movie->duration}}</div>
                              <div class="message"><strong>Idioma: </strong> {{$movie->language}}</div>
                              <div class="message"><strong>Categorias: </strong> {{$movie->category}}</div>
                              <div class="message"><strong>Año de Producción: </strong> {{$movie->production_year}}</div>
                              <div class="messageinfo"><i class="icon-flag"></i>{{$movie->description}}</div>
                            </div>
                        </li>
                      </ul>
                    </div>
                    <a href="{{ action("MovieController@show", array($movie->id)) }}">
                      <div id="notificationFooter">Ver Ahora</div>
                    </a>
                  </div>
                </li>
            {{-- <a class="button" onClick="showmovieSlide()">Ver Ahora</a> --}}
        </div>
        @endforeach

          
        <H3>Mas Vistos</H3>

        @foreach($visitMovies as $key=>$movie)

        @if ($key % 4 == 3)
        <div class="content-grid last-grid">
            @else
            <div class="content-grid">
                @endif
                <a href="{{ action("MovieController@show", array($movie->id)) }}"><img src="files/{{$movie->imageRef}}" title="{{$movie->name}}" style="width: 220px; height: 220px;"/></a>
                <a href="{{ action("MovieController@show", array($movie->id)) }}"><h3 href="{{ action("MovieController@show", array($movie->id)) }}" style="margin-top: 0px; margin-bottom: 0px;">{{$movie->name}}</h3></a>

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

                <a class="button" href="{{ action("MovieController@show", array($movie->id)) }}">Ver Ahora</a>
            </div>
            @endforeach
            <H3>Mejor Evaluados</H3>
    @foreach($bestMovies as $key=>$movie)

    @if ($key % 4 == 3)
    <div class="content-grid last-grid">
        @else
        <div class="content-grid">
            @endif
            <a href="{{ action("MovieController@show", array($movie->id)) }}"><img src="files/{{$movie->imageRef}}" title="allbum-name" style="width: 220px; height: 220px;"/></a>
            <h3 href="{{ action("MovieController@show", array($movie->id)) }}" style="margin-top: 0px; margin-bottom: 0px;">{{$movie->name}}</h3>
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
            
            <a class="button" href="{{ action("MovieController@show", array($movie->id)) }}">Ver Ahora</a>
        </div>
        @endforeach


        </div>
        @endsection

        @section('page-style-files')
        <link href="css/style.css" rel="stylesheet" type="text/css" /> 
        <link href='css/immersive-slider.css' rel='stylesheet' type='text/css'>
        @stop
        @section('page-js-script')
        
@stop