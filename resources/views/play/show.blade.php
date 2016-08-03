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

 <!-- src -->
    <link href="../css/videojs.ass.css" rel="stylesheet">
    <script src="../js/videojs.ass.js"></script>

<div class="content-grids">

  <video id="player" class="video-js vjs-default-skin vjs-big-play-centered">
      <source src="/files/convert/{{$movie->url}}" type="video/mp4">
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
        }
      });
    </script>
</div>
@endsection
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
