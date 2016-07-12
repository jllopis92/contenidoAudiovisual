<!DOCTYPE html>
<html>
  <head>
    <title>Videojs ASS/SSA subtitles</title>

    <!-- npm -->
    {{-- <link href="node_modules/video.js/dist/video-js.min.css" rel="stylesheet">
    <link href="node_modules/libjass/libjass.css" rel="stylesheet">
    <script src="node_modules/video.js/dist/video.min.js"></script>
    <script src="node_modules/libjass/libjass.js"></script> --}}

    <!-- bower-->
{{ Html::style('assets/vendor/video.js/dist/video-js.min.css') }}
{{ Html::style('assets/vendor/libjass/libjass.css') }}

{{ Html::script('assets/vendor/video.js/dist/video.min.js') }}
{{ Html::script('assets/vendor/libjass/libjass.js') }}

  {{--   <link href="..\vendor\bower_dl\videojs\dist\video-js.min.css" rel="stylesheet">
    <link href="/bower_components/libjass/libjass.css" rel="stylesheet">
    <script src="/bower_components/videojs/dist/video.min.js"></script>
    <script src="../vendor/bower_dl/libjass/libjass.js"></script> --}}


    <!-- src -->
    <link href="../css/videojs.ass.css" rel="stylesheet">
    <script src="../js/videojs.ass.js"></script>
  </head>

  <body>
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
        },
        playbackRates: [0.5, 1, 1.5, 2]
      });
    </script>
  </body>
</html>

    Contact GitHub API Training Shop Blog About 

