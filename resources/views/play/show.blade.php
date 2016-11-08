@extends('layouts.app')

@section('content')

{{-- <link href="http://vjs.zencdn.net/5.10.4/video-js.css" rel="stylesheet">
--}}
<!-- If you'd like to support IE8 -->
{{-- <script src="http://vjs.zencdn.net/ie8/1.1.2/videojs-ie8.min.js"></script> --}}
<!-- bower-->

<!-- bower-->
{{ Html::style('assets/vendor/video.js/dist/video-js.min.css') }}
{{ Html::style('assets/vendor/libjass/libjass.css') }}

{{ Html::script('assets/vendor/video.js/dist/video.min.js') }}
{{ Html::script('assets/vendor/libjass/libjass.js') }}

<!-- jQuery library (served from Google) -->
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
<script src="../js/jquery.bxslider.min.js"></script>

<style>
  /****** Rating Starts *****/
  @import url(http://netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css);

  fieldset, label { margin: 0; padding: 0; }
  h1 { font-size: 1.5em; margin: 10px; }

  .rating { 
    border: none;
    float: left;
  }

  .rating > input { display: none; } 
  .rating > label:before { 
    margin: 5px;
    font-size: 1.25em;
    font-family: FontAwesome;
    display: inline-block;
    content: "\f005";
  }

  .rating > .half:before { 
    content: "\f089";
    position: absolute;
  }

  .rating > label { 
    color: #ddd; 
    float: right; 
  }

  .rating > input:checked ~ label, 
  .rating:not(:checked) > label:hover,  
  .rating:not(:checked) > label:hover ~ label { color: #FFD700;  }

  .rating > input:checked + label:hover, 
  .rating > input:checked ~ label:hover,
  .rating > label:hover ~ input:checked ~ label, 
  .rating > input:checked ~ label:hover ~ label { color: #FFED85;  }     


  /* Downloaded from http://devzone.co.in/ */
</style>

<div class="content-grids">
  <div class="row">
    @foreach($trailers as $trailer)
    @if ($trailer->video_id == $movie->id)
    <h3 style="margin-top:0px">{{$movie->name}}</h3>
    @endif
    @endforeach
    <div class="col-md-8">

      {{--  --}}
      <video id="player" class="video-js vjs-default-skin vjs-big-play-centered">
        @if (Auth::guest())
        <source src="/files/convert/trailers/{{$trailer->url}}" type="video/mp4">
          @else
          <source src="/files/convert/videos/{{$movie->url}}" type="video/mp4">
            @endif
          </video>
          <script>
            videojs('player', {
              controls: true,
              nativeControlsForTouch: false,
              width: 600,
              height: 400,
              plugins: {
                ass: {
                  'src': ["/files/subs/Warcraft 2016 HDTC x264 AC3 TiTAN-fondonegro.ssa"]
                }
              },
              playbackRates: [0.5, 1, 1.5, 2]
            });
          </script>

        </div>
        @if (!Auth::guest())

        <div id="dv1">


        </div>
        <br><br><br>
        <div class="col-md-4">
          <div class="row">
           <label>{{$movie->description}}</label> 
           <br><br><br>  
           <h5>Evalua este video</h5>
           <!-- Rating start -->
           <script>
            var j = jQuery.noConflict();
            j(document).ready(function () {
              j("#demo2 .stars").click(function () {

                j.post('../rating.php',{
                  rate:$(this).val(),
                  user:{!! Auth::user()->id !!},
                  movie:{{$movie->id}}
                },function(d){
                  if(d>0)
                  {
            //alert('You already rated'+d);
          }else{
            //alert('Thanks For Rating');
          }
        });
                j(this).attr("checked");
              });
            });
          </script>
          <fieldset id='demo2' class="rating">
            <input class="stars" type="radio" id="star5" name="rating" value="5" />
            <label class = "full" for="star5" title="Excelente - 5 estrellas"></label>
            <input class="stars" type="radio" id="star4half" name="rating" value="4.5" />
            <label class="half" for="star4half" title="Muy bueno - 4.5 estrellas"></label>
            <input class="stars" type="radio" id="star4" name="rating" value="4" />
            <label class = "full" for="star4" title="Muy bueno - 4 estrellas"></label>
            <input class="stars" type="radio" id="star3half" name="rating" value="3.5" />
            <label class="half" for="star3half" title="Medio - 3.5 estrellas"></label>
            <input class="stars" type="radio" id="star3" name="rating" value="3" />
            <label class = "full" for="star3" title="Medio - 3 estrellas"></label>
            <input class="stars" type="radio" id="star2half" name="rating" value="2.5" />
            <label class="half" for="star2half" title="Relativamente malo - 2.5 estrellas"></label>
            <input class="stars" type="radio" id="star2" name="rating" value="2" />
            <label class = "full" for="star2" title="Relativamente malo - 2 estrellas"></label>
            <input class="stars" type="radio" id="star1half" name="rating" value="1.5" />
            <label class="half" for="star1half" title="Malo - 1.5 estrellas"></label>
            <input class="stars" type="radio" id="star1" name="rating" value="1" />
            <label class = "full" for="star1" title="Malo - 1 estrella"></label>
            <input class="stars" type="radio" id="starhalf" name="rating" value="0.5" />
            <label class="half" for="starhalf" title="Muy malo - 0.5 estrellas"></label>
          </fieldset>
          <!-- Demo 2 end -->

          <br><br><br>
          <div id='feedback'></div>

          <!-- Demo 3 end -->

          <div style='clear:both;'></div>

        </div>

      </div>

    </div>
    @else


    <div id="dv1">


    </div>
    <br><br><br>
    <div class="col-md-4">
      <div class="row">
        <label>{{$movie->description}}</label>
        <br><br><br>
        <label>Para visualizar este video completo debe estar registrado.</label>   
      </div>   
    </div>
  </div>

  @endif
  <br><br><br>
  <div class="col-md-12">
  <H4>Videos recomendados</H4>
  <div class="flexslider">
    <ul class="slides">
      <script defer src="/js/jquery.flexslider.js"></script>
      <script type="text/javascript"> 
        jQuery.noConflict();
        jQuery(function() {
          jQuery('.flexslider').flexslider({
            animation: "slide",
            animationLoop: false,
            itemWidth: 120,
            itemMargin: 5,
            minItems: 2,
            maxItems: 4,
          });
        });

      </script>
      @foreach($newMovies as $movie2)
      <li>
        <a href="{{ action("MovieController@show", array($movie2->id)) }}">
          <img src="../files/{{$movie2->imageRef}}" />
          <h3 href="{{ action("MovieController@show", array($movie2->id)) }}" style="color: #888;
            display: block;
            font-family: 'Roboto';
            font-size: 0.875em;
            line-height: 1.5em;
            padding: 10px 0;
            text-transform: uppercase;
            text-align:center;
            margin-top: 0px">{{$movie2->name}}</h3>
          </a>
        </li>
        @endforeach

      </ul>
    </div>
    </div>


{{-- <ul class="slider1">
  <script type="text/javascript"> 
    var jq = jQuery.noConflict();
    jq(document).ready(function(){ 

      jq('.slider1').bxSlider({
        captions: true,
        slideWidth: 200,
        minSlides: 2,
        maxSlides: 3,
        slideMargin: 10
      }); 
    });
  </script>
  @foreach($movies as $movie2)
  <div class="slide" >
    <a href="{{ action("MovieController@show", array($movie2->id)) }}">
      <img src="../files/{{$movie2->imageRef}}" title="{{$movie2->name}}">
    </a>
  </div>
  @endforeach
</ul> --}}

@endsection

@section('page-style-files')

<link href="/css/videojs.ass.css" rel="stylesheet">
<link href="http://netdna.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.css" rel="stylesheet">
<link href="/css/star-rating.css" media="all" rel="stylesheet" type="text/css" />
<link href="/css/flexslider.css" rel="stylesheet" />
{{-- <link href="/css/jquery.bxslider.css" rel="stylesheet" /> --}}
@stop

@section('page-js-files')
<script src="{!!url('../js/jquery.min.js')!!}"></script>
<script src="../../js/videojs.ass.js"></script>
@stop
