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

<div class="content-grids">

{{--  --}}
  @foreach($trailers as $trailer)
    @if ($trailer->video_id == $movie->id)
      <h3>{{$trailer->url}}</h3>
    @endif
  @endforeach

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
        width: 640,
        height: 360,
        plugins: {
          ass: {
            'src': ["/files/subs/Warcraft 2016 HDTC x264 AC3 TiTAN-fondonegro.ssa"]
          }
        },
        playbackRates: [0.5, 1, 1.5, 2]
      });
    </script>

{{-- <label for="input-1" class="control-label">Rate This</label>
    <input id="input-1" name="input-1" class="rating-loading"> --}}

    <input id="input-1" name="input-1" type="text" class="rating" data-size="xs" >

<div style="padding:0px; margin:0px 0px 30px; background-color:#fff;font-family:Arial, sans-serif" >

<h3>Videos Similares</h3>
    <!-- use jssor.slider-21.1.5.debug.js instead for debug -->
    <script type="text/javascript" src="../js/jssor.slider-21.1.5.min.js"></script>
    <!-- use jssor.slider-21.1.5.debug.js instead for debug -->
    <script>
        jssor_1_slider_init = function() {
            
            var jssor_1_options = {
              $AutoPlay: false,
              $AutoPlaySteps: 4,
              $SlideDuration: 160,
              $SlideWidth: 160,
              $SlideSpacing: 8,
              $Cols: 4,
              $ArrowNavigatorOptions: {
                $Class: $JssorArrowNavigator$,
                $Steps: 4
              },
              
            };
            
            var jssor_1_slider = new $JssorSlider$("jssor_1", jssor_1_options);
            
            //responsive code begin
            //you can remove responsive code if you don't want the slider scales while window resizing
            function ScaleSlider() {
                var refSize = jssor_1_slider.$Elmt.parentNode.clientWidth;
                if (refSize) {
                    refSize = Math.min(refSize, 940);
                    jssor_1_slider.$ScaleWidth(refSize);
                }
                else {
                    window.setTimeout(ScaleSlider, 30);
                }
            }
            ScaleSlider();
            $Jssor$.$AddEvent(window, "load", ScaleSlider);
            $Jssor$.$AddEvent(window, "resize", ScaleSlider);
            $Jssor$.$AddEvent(window, "orientationchange", ScaleSlider);
            //responsive code end
        };
    </script>
<style>
        
        /* jssor slider bullet navigator skin 03 css */
        /*
        .jssorb03 div           (normal)
        .jssorb03 div:hover     (normal mouseover)
        .jssorb03 .av           (active)
        .jssorb03 .av:hover     (active mouseover)
        .jssorb03 .dn           (mousedown)
        */
        .jssorb03 {
            position: absolute;
        }
        .jssorb03 div, .jssorb03 div:hover, .jssorb03 .av {
            position: absolute;
            /* size of bullet elment */
            width: 21px;
            height: 21px;
            text-align: center;
            line-height: 21px;
            color: white;
            font-size: 12px;
            background: url('../img/b03.png') no-repeat;
            overflow: hidden;
            cursor: pointer;
        }
        .jssorb03 div { background-position: -5px -4px; }
        .jssorb03 div:hover, .jssorb03 .av:hover { background-position: -35px -4px; }
        .jssorb03 .av { background-position: -65px -4px; }
        .jssorb03 .dn, .jssorb03 .dn:hover { background-position: -95px -4px; }

        /* jssor slider arrow navigator skin 03 css */
        /*
        .jssora03l                  (normal)
        .jssora03r                  (normal)
        .jssora03l:hover            (normal mouseover)
        .jssora03r:hover            (normal mouseover)
        .jssora03l.jssora03ldn      (mousedown)
        .jssora03r.jssora03rdn      (mousedown)
        */
        .jssora03l, .jssora03r {
            display: block;
            position: absolute;
            /* size of arrow element */
            width: 55px;
            height: 55px;
            cursor: pointer;
            background: url('../img/a03.png') no-repeat;
            overflow: hidden;
        }
        .jssora03l { background-position: -3px -33px; }
        .jssora03r { background-position: -63px -33px; }
        .jssora03l:hover { background-position: -123px -33px; }
        .jssora03r:hover { background-position: -183px -33px; }
        .jssora03l.jssora03ldn { background-position: -243px -33px; }
        .jssora03r.jssora03rdn { background-position: -303px -33px; }
    </style>


    <div id="jssor_1" style="position: relative; margin: 0 auto; top: 0px; left: 0px; width: 809px; height: 150px; overflow: hidden; visibility: hidden; ">
        <!-- Loading Screen -->
        <div data-u="loading" style="position: absolute; top: 0px; left: 0px;">
            <div style="filter: alpha(opacity=70); opacity: 0.7; position: absolute; display: block; top: 0px; left: 0px; width: 100%; height: 100%;"></div>
            <div style="position:absolute;display:block;background:url('../img/loading.gif') no-repeat center center;top:0px;left:0px;width:100%;height:100%;"></div>
        </div>
        <div data-u="slides" style="cursor: default; position: relative; top: 0px; left: 0px; width: 809px; height: 150px; overflow: hidden;">

          @foreach($movies as $movie2)
          {{-- class="content-grid" --}}
            <div>
              {{-- <img u="image" src="../files/{{$movie2->imageRef}}" /> --}}
              <img u="image" style="width:70%; height:70%;" src="../files/{{$movie2->imageRef}}" />
              <h5 href="{{ action("MovieController@show", array($movie2->id)) }}" style="margin-top: 0px; margin-bottom: 0px;">{{$movie2->name}}</h5>

{{-- 
              <a href="{{ action("MovieController@show", array($movie2->id)) }}">
                <img data-u="image" src="../files/{{$movie2->imageRef}}"/>{{$movie2->name}}
              </a>
              <a href="{{ action("MovieController@show", array($movie2->id)) }}">
                <h3>{{$movie2->name}}</h3> 
              </a>--}}
            </div>
          @endforeach
            
            
        </div>
        <!-- Bullet Navigator -->
        <!-- Arrow Navigator -->
        <span data-u="arrowleft" class="jssora03l" style="top:0px;left:8px;width:55px;height:55px;" data-autocenter="2"></span>
        <span data-u="arrowright" class="jssora03r" style="top:0px;right:8px;width:55px;height:55px;" data-autocenter="2"></span>
    </div>
    <script>
        jssor_1_slider_init();
    </script>
  </div>




</div>

@endsection

@section('page-style-files')

    <link href="/css/videojs.ass.css" rel="stylesheet">

    <link href="http://netdna.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.css" rel="stylesheet">
    <link href="/css/star-rating.css" media="all" rel="stylesheet" type="text/css" />
@stop

@section('page-js-files')
  <script src="{!!url('../js/jquery.min.js')!!}"></script>
  <script src="../../js/videojs.ass.js"></script>
  <script src="../js/star-rating.js" type="text/javascript"></script>
@stop

@section('page-js-script')
<script type="text/javascript">
    $(document).ready(function() {
        $('#input-1').rating({
            step: 1,
            starCaptions: {1: 'Very Poor', 2: 'Poor', 3: 'Ok', 4: 'Good', 5: 'Very Good'},
            starCaptionClasses: {1: 'text-danger', 2: 'text-warning', 3: 'text-info', 4: 'text-primary', 5: 'text-success'}
        });
      //$('#input-1').rating({hoverEnabled: true});
      //$("#input-1").rating({language: 'es'});
      //$("#input-1").rating({language: 'de'});
      //$('#input-1').rating({});
    });
</script>
@stop

{{-- <script type="text/javascript" src="../js/VideoFlowPlayer/flowplayer.min.js"></script>

<video class="Vid854" controls width="600" height="400" preload >
	<source src="/files/convert/{{$movie->url}}" type='video/mp4; codecs="avc1.42E01E, mp4a.40.2"'>
		<source src="/files/convert/{{$movie->url}}" type='video/webm; codecs="vp8, vorbis"'>
			<source src="/files/convert/{{$movie->url}}" type='video/ogg; codecs="theora, vorbis"'>
				<div class="Vid854">
					<a id="player" href="VideoTest-Flash.mp4"></a>
					<script>flowplayer("player", "../js/VideoFlowPlayer/flowplayer.swf");</script>
				</div>
			</video> --}}

    <!-- <video src="/files/{{$movie->url}}" controls width="600" height="400">
    </video> -->
