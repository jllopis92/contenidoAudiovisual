@extends('layouts.app')
@section('content')

<head>
  <link href="http://vjs.zencdn.net/5.10.4/video-js.css" rel="stylesheet">

  <!-- If you'd like to support IE8 -->
  <script src="http://vjs.zencdn.net/ie8/1.1.2/videojs-ie8.min.js"></script>
   <!-- bower-->
   
<link href="css/videojs.ass.css" rel="stylesheet">
<script src="js/videojs.ass.js"></script>


     <link href="../bower_components/videojs/dist/video-js.min.css" rel="stylesheet">
    <link href="bower_components/libjass/libjass.css" rel="stylesheet">
    <script src="bower_components/videojs/dist/video.min.js"></script>
    <script src="bower_components/libjass/libjass.js"></script>
</head>

<body>
  <video id="my-video" class="video-js" controls preload="auto" width="640" height="264"
  poster="MY_VIDEO_POSTER.jpg" data-setup="{}">
    <source src="/files/convert/{{$movie->url}}" type='video/mp4'>
    <source src="/files/convert/{{$movie->url}}" type='video/webm'>
    <p class="vjs-no-js">
      To view this video please enable JavaScript, and consider upgrading to a web browser that
      <a href="http://videojs.com/html5-video-support/" target="_blank">supports HTML5 video</a>
    </p>
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

  <script src="http://vjs.zencdn.net/5.10.4/video.js"></script>
</body>

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
@stop