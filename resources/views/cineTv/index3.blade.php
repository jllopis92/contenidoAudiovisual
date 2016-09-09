@extends('layouts.app')

@section('content')

{{ Html::style('assets/vendor/video.js/dist/video-js.min.css') }}
{{ Html::style('assets/vendor/libjass/libjass.css') }}

{{ Html::script('assets/vendor/video.js/dist/video.js') }}
{{ Html::script('assets/vendor/videojs-playlist/dist/videojs-playlist.js') }}
{{ Html::script('assets/vendor/libjass/libjass.js') }}

<script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>


<video id="myPlayerID" class="video-js" controls></video>

  <ol class="vjs-playlist"></ol>

  <script type="text/javascript">
    videojs('myPlayerID').ready(function () {
      var myPlayer = this;
      myPlayer.playlist([{
        "sources": [{
          "src": "http://solutions.brightcove.com/bcls/assets/videos/Sea_SeaHorse.mp4", "type": "video/mp4"
        }],
        "name": "Seahorse",
        "thumbnail": "http://solutions.brightcove.com/bcls/assets/images/Sea_Seahorse_poster.png",
        "poster": "http://solutions.brightcove.com/bcls/assets/images/Sea_Seahorse_poster.png"
      }, {
        "sources": [{
          "src": "http://solutions.brightcove.com/bcls/assets/videos/Sea_Anemone.mp4", "type": "video/mp4"
        }],
        "name": "Sea Anemone",
        "thumbnail": "http://solutions.brightcove.com/bcls/assets/images/Sea_Anemone_poster.png",
        "poster": "http://solutions.brightcove.com/bcls/assets/images/Sea_Anemone_poster.png"
      }, {
        "sources": [{
          "src": "http://solutions.brightcove.com/bcls/assets/videos/Tiger.mp4", "type": "video/mp4"
        }],
        "name": "Tiger",
        "thumbnail": "http://solutions.brightcove.com/bcls/assets/images/Tiger_poster.png",
        "poster": "http://solutions.brightcove.com/bcls/assets/images/Tiger_poster.png"
      }, {
        "sources": [{
          "src": "http://solutions.brightcove.com/bcls/assets/videos/Sea_ClownFish.mp4", "type": "video/mp4"
        }],
        "name": "Clownfish",
        "thumbnail": "http://solutions.brightcove.com/bcls/assets/images/Sea_ClownFish_poster.png",
        "poster": "http://solutions.brightcove.com/bcls/assets/images/Sea_ClownFish_poster.png"
      }, {
        "sources": [{
          "src": "http://solutions.brightcove.com/bcls/assets/videos/Sea_LionFish.mp4", "type": "video/mp4"
        }],
        "name": "Lionfish",
        "thumbnail": "http://solutions.brightcove.com/bcls/assets/images/Sea_LionFish_poster.png",
        "poster": "http://solutions.brightcove.com/bcls/assets/images/Sea_LionFish_poster.png"
      }]);
    });
  </script>




<video id="my-video" class="video-js" controls preload="auto" width="640" height="264">
  </video>
  <script>
        videojs('my-video').ready(function () {
          var myPlayer = this;
          myPlayer.playlist([{
            "sources": [{
              "src": "http://solutions.brightcove.com/bcls/assets/videos/Sea_SeaHorse.mp4", "type": "video/mp4"
            }],
            "name": "Seahorse",
            "thumbnail": "http://solutions.brightcove.com/bcls/assets/images/Sea_Seahorse_poster.png",
            "poster": "http://solutions.brightcove.com/bcls/assets/images/Sea_Seahorse_poster.png"
            }, {
            "sources": [{
              "src": "http://solutions.brightcove.com/bcls/assets/videos/Sea_Anemone.mp4", "type": "video/mp4"
            }],
            "name": "Sea Anemone",
            "thumbnail": "http://solutions.brightcove.com/bcls/assets/images/Sea_Anemone_poster.png",
            "poster": "http://solutions.brightcove.com/bcls/assets/images/Sea_Anemone_poster.png"
            }, {
            "sources": [{
              "src": "http://solutions.brightcove.com/bcls/assets/videos/Tiger.mp4", "type": "video/mp4"
            }],
            "name": "Tiger",
            "thumbnail": "http://solutions.brightcove.com/bcls/assets/images/Tiger_poster.png",
            "poster": "http://solutions.brightcove.com/bcls/assets/images/Tiger_poster.png"
            }, {
            "sources": [{
              "src": "http://solutions.brightcove.com/bcls/assets/videos/Sea_ClownFish.mp4", "type": "video/mp4"
            }],
            "name": "Clownfish",
            "thumbnail": "http://solutions.brightcove.com/bcls/assets/images/Sea_ClownFish_poster.png",
            "poster": "http://solutions.brightcove.com/bcls/assets/images/Sea_ClownFish_poster.png"
            }, {
            "sources": [{
              "src": "http://solutions.brightcove.com/bcls/assets/videos/Sea_LionFish.mp4", "type": "video/mp4"
            }],
            "name": "Lionfish",
            "thumbnail": "http://solutions.brightcove.com/bcls/assets/images/Sea_LionFish_poster.png",
            "poster": "http://solutions.brightcove.com/bcls/assets/images/Sea_LionFish_poster.png"
            }]);
        });

        videojs('my-video', {
          /*controls: true,
          nativeControlsForTouch: false,
          width: 640,
          height: 360,
          plugins: {
            ass: {
              'src': ["/files/subs/Warcraft 2016 HDTC x264 AC3 TiTAN-fondonegro.ssa"]
            }
          },
          playbackRates: [0.5, 1, 1.5, 2]*/
        });
        
      </script>


{{-- <div class="content-grids">
<video id="player" class="video-js vjs-default-skin vjs-big-play-centered">
  <source src="/files/convert/videos/1231Test.mp4" type="video/mp4">
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
</div> --}}
{{-- <script src="http://cdn.dashjs.org/latest/dash.all.min.js"></script>
...
<style>
    video {
       width: 640px;
       height: 360px;
    }
</style>
<div>
    <video data-dashjs-player autoplay src="http://localhost:8080" controls>
    </video>
  </div> --}}

{{-- <div ng-app="myApp">
<div ng-controller="HomeCtrl as controller" class="videogular-container">
    <videogular vg-theme="controller.config.theme.url">
        <vg-media vg-src="controller.config.sources" vg-dash></vg-media>

        <vg-controls>
            <vg-play-pause-button></vg-play-pause-button>
                <vg-volume>
                <vg-mute-button></vg-mute-button>
                <vg-volume-bar></vg-volume-bar>
            </vg-volume>
            <vg-fullscreen-button></vg-fullscreen-button>
        </vg-controls>

        <vg-overlay-play></vg-overlay-play>
        <vg-poster vg-url='controller.config.plugins.poster'></vg-poster>
    </videogular>
</div>
</div> --}}


{{-- <div id='mediaspace1'>

<script type='text/javascript'>
  jwplayer('mediaspace1').setup({
    'flashplayer': 'jwplayer/player.swf',
    'file': 'YourFLVFileName.flv',
    'streamer': 'rtmp://192.168.0.34:1935/oflaDemo',
    'controlbar': 'bottom',
    'width': '470',
    'height': '290'
  });
</script>
</div>

<br/>

<strong>Test MP4 Streaming</strong>
<script type='text/javascript' src='jwplayer/jwplayer.js'></script>

<div id='mediaspace2'>Test MP4

<script type='text/javascript'>
  jwplayer('mediaspace2').setup({
    'flashplayer': 'jwplayer/player.swf',
    'file': 'YourMP4FileName.mp4',
    'streamer': 'rtmp://192.168.0.34:1935/oflaDemo',
    'controlbar': 'bottom',
    'width': '470',
    'height': '290'
  });
</script>
</div> --}}

@endsection

@section('page-style-files')

<link href="/css/videojs.ass.css" rel="stylesheet">
<link href="http://netdna.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.css" rel="stylesheet">
{{-- <link href="/css/jquery.bxslider.css" rel="stylesheet" /> --}}
  {{-- <script src="assets/vendor/angular/angular.min.js"></script>
<script src="assets/vendor/angular-sanitize/angular-sanitize.min.js"></script>
<script src="assets/vendor/videogular/videogular.js"></script>
<script src="assets/vendor/videogular-controls/vg-controls.js"></script>
<script src="assets/vendor/videogular-overlay-play/vg-overlay-play.js"></script>
<script src="assets/vendor/videogular-poster/vg-poster.js"></script>
<script src="assets/vendor/videogular-buffering/vg-buffering.js"></script>
<script src="assets/vendor/videogular-dash/vg-dash.js"></script>
<script src="js/main.js"></script> 
<script src="assets/vendor/dashjs/dist/dash.all.min.js"></script>--}}
@stop

@section('page-js-files')
<script src="{!!url('../js/jquery.min.js')!!}"></script>
<script src="../../js/videojs.ass.js"></script>
@stop

@section('page-js-files')

@stop
