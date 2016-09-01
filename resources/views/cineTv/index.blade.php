@extends('layouts.app')

@section('content')

{{-- <div ng-app="myApp">
<div ng-controller="HomeCtrl as controller" class="videogular-container">
    <videogular vg-theme="controller.config.theme.url">
        <vg-media vg-src="controller.config.sources"
                  vg-tracks="controller.config.tracks"
                  vg-native-controls="true">
        </vg-media>
    </videogular>
</div>
</div>
 --}}

{{--  <video width="700" src="http://127.0.0.1:8080" autoplay type="video/ogg; codecs=theora"></video>
 --}}
<script src="http://cdn.dashjs.org/latest/dash.all.min.js"></script>
...
<style>
    video {
       width: 640px;
       height: 360px;
    }
</style>
<div>
    <video data-dashjs-player autoplay src="http://192.168.0.17:8080" controls>
    </video>
    </div>

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

@section('page-js-files')
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
